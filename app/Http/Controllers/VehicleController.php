<?php

namespace App\Http\Controllers;

use App\Vehicle;

use App\VehicleMaker;

use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function show(){

        $vehicles = auth()->user()->vehicles;
        foreach ($vehicles as $vehicle) {
            $vehicle['maker'] = $vehicle->VehicleMaker->name;

        }
        return view('/home', [
           'vehicles' => $vehicles
        ]);
    }
    //
    public function edit(){
        if(auth()->user()->hasPermissionTo('Verify Posts')){

            $vehicles = Vehicle::where('admin_verification', '=', 'waiting')->orderBy('id', 'desc')->get();

            return view('vehicle.vehicles_edit', [
                'vehicles' => $vehicles
            ]);

        }else{
            return redirect('/welcome');
        }
    }
    //
    public function update(){
        //Check if user is verified to update
        if(auth()->user()->hasPermissionTo('Verify Posts')){
           // dd(request()->all());
            $data = request()->validate([
                'admin_verification' => ['required','string'],
                'id' => 'required',
            ]);
            if(Vehicle::find($data['id'])){
                $vehicle = Vehicle::find($data['id']);

                $vehicle->admin_verification = $data['admin_verification'];

                $vehicle->save();

                return redirect('vehicles/edit')->with(['response' => true]);
            }else{
                redirect('/welcome');
            }
        }else{
            return redirect('/welcome');
        }
    }
    //
    public function create(){
        //get all Vehicle makers
        $maker = VehicleMaker::all('id','name');

        return view('vehicle.create', [
            'maker' => $maker
        ]);
    }

    //
    public function store(){
        //dd(request()->all());
        $data = request()->validate([
            'name' => 'required',
            'vehicle_maker_id' => 'required|exists:vehicle_makers,id',
            'manufacture_year' => ['required','Integer', 'Between: 1941,'. date("Y")],
            'mileage' => ['required', 'numeric', 'Between: 0, 5000000'],
            'price' => ['required', 'numeric', 'Between: 0, 900000'],
            'vehicle_image' => ['required', 'image']
        ]);
        $imagePath = request('vehicle_image')->store('vehicle_imgs', 'public');

        $data['vehicle_image'] = $imagePath;

        $data['category_id'] = 1;

        auth()->user()->vehicles()->create($data);

        return redirect('/home')->with(['response' => true]);
    }
}
