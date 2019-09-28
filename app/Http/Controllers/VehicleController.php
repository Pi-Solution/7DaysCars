<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class VehicleController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    //
    public function create(){
        return view('vehicle.create');
    }

    //
    public function store(){
        //dd(request()->all());
        $data = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'manufacture_year' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'vehicle_image' => ['required', 'image']
            ]);

        //$image = request('vehicle_image')->store('vehicle_imgs', 'public');

        //$data['vehicle_image'] = $image;

        auth()->user()->vehicles()->create($data);

        return redirect('/home');
    }
}
