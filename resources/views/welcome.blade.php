
@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">
@endsection

@section('nav_bar')
    @include('layouts.nav_bar')
@endsection

@section('container')
    <div class="container-fluid p-0 m-0">
        <div class="row mt-4">
            <div class="col-md-2 offset-md-2 pl-0 pr-0">
                <button type="button" class="btn btn-secondary w-100 h-75 rounded-0">Category</button>
            </div>
            <div class="col-md-6 pl-0 pr-0">
                <select class="custom-select custom-select-lg mb-3 h-75 rounded-0" id="categories" onchange="get_data()">
                    <option selected value="0">All</option>
                    @foreach ($categories as $category)
                        @if ($category->name != 'underfined')
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div id="vehicles">
            @foreach ($vehicles as $vehicle)
                <div class="row mt-3">
                    <div class="col-md-8 offset-md-2 rounded p-5 border border-dark">
                        <div class="row">
                            <div class="col-md-4 border border-dark rounded p-0">
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
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm ml-0 pl-0 text-right">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$vehicle->manufacture_year}}</li>
                                            <li class="list-group-item">{{$vehicle->mileage}}</li>
                                            <li class="list-group-item pl-0 pr-0">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ URL::asset('js/welcome.js') }}"></script>
@endsection


