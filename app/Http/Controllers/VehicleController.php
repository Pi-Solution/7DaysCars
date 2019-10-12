<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\VehicleMaker;


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
        $image = request('vehicle_image')->store('vehicle_imgs', 'public');

        $data['vehicle_image'] = $image;

        $data['category_id'] = 1;

        auth()->user()->vehicles()->create($data);

        return redirect('/home')->with(['response' => true]);;
    }
}
