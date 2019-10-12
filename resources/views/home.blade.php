@extends('layouts.master')
<!--
https://3.bp.blogspot.com/-Hnot9oTMHZs/XDLDK4WyUXI/AAAAAAAADYY/vMw9MXdQjsQb1-w1WTtH31o2nGO0QWAPwCHMYCw/s1600/wallpaper-cars-lamborguini-amazing-wallpaper-hd-library-%25E2%2580%25A2.jpg
-->
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
@endsection
@section('nav_bar')
    @include('layouts.nav_bar')
@endsection

@section('container')
    <div class="container-fluid p-0 m-0">
        <!--Alert for saved Vehicles-->
        @if (session()->get('response'))
            <div class="alert alert-info" role="alert">
                Your Vehicle is successfully added. Please wait for admin to approve your post!!!
            </div>
        @endif
        <!-- Vehicle Cards  -->
        @foreach ($vehicles as $vehicle)
            <div class="row mt-3">
                <div class="col-md-8 offset-md-2 rounded p-5 border border-dark {{$vehicle->admin_verification}}_border_left">
                    <div class="row">
                        <div class="col-md-4 border rounded {{$vehicle->admin_verification}}_border">
                            <div class="img_div">
                                <img src="../storage/app/public/{{$vehicle->vehicle_image}}" class="card_img">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col">
                                    <h4><strong>{{$vehicle->name}}</strong></h4>
                                </div>
                                <div class="col text-right">
                                    <h4>{{$vehicle->price}} KM</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>{{$vehicle->maker}}</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm mr-0 pr-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Manufacture Year :</li>
                                        <li class="list-group-item">Mileage :</li>
                                        <li class="list-group-item pl-0">
                                            <button type="button" class=" btn ">Admin Approval :</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm ml-0 pl-0 text-right">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{$vehicle->manufacture_year}}</li>
                                        <li class="list-group-item">{{$vehicle->mileage}}</li>
                                        <li class="list-group-item pl-0 pr-0">
                                            <button type="button" class="w-100 btn {{$vehicle->admin_verification}}">{{$vehicle->admin_verification}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="create_vehicle rounded-circle bg-primary text-white">
            <a href="vehicle/create" class="create_vehicle_link text-white">+</a>
        </div>
    </div>
@endsection
