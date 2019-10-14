<?php

namespace App\Http\Controllers;

use App\Vehicle;

use App\VehicleMaker;

use App\VehicleCategory;

use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show all user vehicle
     *
     */
    public function show(){

        $vehicles = auth()->user()->vehicles;
        foreach ($vehicles as $vehicle) {
            $vehicle['maker'] = $vehicle->VehicleMaker->name;

        }
        return view('/home', [
           'vehicles' => $vehicles
        ]);
    }
    /**
     * Admin Update for Vehicle Adding category and aproves Post
     *
     */
    public function edit(){
        if(auth()->user()->hasPermissionTo('Verify Posts')){

            $vehicles = Vehicle::where('admin_verification', '=', 'waiting')->orderBy('id', 'desc')->get();

            $vehicleCategories = VehicleCategory::all();

            return view('vehicle.vehicles_edit', [
                'vehicles' => $vehicles,
                'vehicleCategories' => $vehicleCategories
            ]);

        }else{
            return redirect('/welcome');
        }
    }
    /**
     * Save update to db
     *
     */
    public function update(){
        //Check if user is verified to update
        if(auth()->user()->hasPermissionTo('Verify Posts')){
           //   dd(request()->all());
            $data = request()->validate([
                'admin_verification' => ['required','string'],
                'id' => 'required',
                'category_id' => 'required|exists:vehicle_categories,id'
            ]);
            if ($data['category_id'] == 1) {

                return redirect('/vehicles/edit')->with([
                    'category_error' => 'Please choose Vehicle Category'
                ]);
            }else{
                if(Vehicle::find($data['id'])){
                    $vehicle = Vehicle::find($data['id']);

                    $vehicle->admin_verification = $data['admin_verification'];

                    $vehicle->category_id = $data['category_id'];

                    $vehicle->save();

                    return redirect('vehicles/edit')->with(['update' => true]);
                }else{
                    redirect('/welcome');
                }
            }
        }else{
            return redirect('/welcome');
        }
    }
    /**
     * Form for Vehicle Posts Creation
     *
     */
    public function create(){
        //get all Vehicle makers
        $maker = VehicleMaker::all('id','name');

        return view('vehicle.create', [
            'maker' => $maker
        ]);
    }

    /**
     * Save Vehicle to db
     *
     */
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
    /**
     * Remove Vehicle from db
     *
     */
    public function destroy(){
        $data = request()->validate([
            'vehicle' => ['required', 'integer']
        ]);

        $vehicle = auth()->user()->vehicles()->find($data['vehicle']);

        if (isset($vehicle)) {
            $vehicle->delete(1);

            return redirect('/home')->with(['delete' => true]);
        }else {
            dd('wtf');
        }
    }
}
