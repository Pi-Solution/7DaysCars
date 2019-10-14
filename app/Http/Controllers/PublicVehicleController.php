<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle;

use App\VehicleCategory;

class PublicVehicleController extends Controller
{
    /**
     * Show all vehicles
     *
     */
    public function index(){

        $vehicles = Vehicle::all();

        //Get vehicle maker
        foreach ($vehicles as $vehicle) {
           $vehicle->maker = $vehicle->VehicleMaker->name;
        }

        $categories = VehicleCategory::all();

        return view('welcome', [
            'vehicles' => $vehicles,
            'categories' =>$categories
        ]);
    }
    /**
     * Show Vehicles by category
     *
     */
    public function show($id){

        # Check if user want to see all vehicles or by category
        if ($id == 0) {
            //Get vehicle maker
            $vehicles = Vehicle::all();
            foreach ($vehicles as $vehicle) {
                $vehicle->maker = $vehicle->VehicleMaker->name;
            }
           return $vehicles;
        }else{
            $vehicles = VehicleCategory::findOrFail($id)->vehicles;
            foreach ($vehicles as $vehicle) {
                $vehicle->maker = $vehicle->VehicleMaker->name;
            }
            return $vehicles;
        }
    }
}
