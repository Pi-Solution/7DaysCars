@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/vehicles/create.css') }}">
@endsection

@section('nav_bar')
    @include('layouts.nav_bar')
@endsection

@section('container')
    <div class="container">
        <form action="/7DaysCars/public/vehicle" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row mt-5 border shadow-sm">

                <div class="col-10 offset-1 rounded mt-5 mb-5">
                    <div class="col-sm">
                        <div class="form-group row">
                            <h3>Add New Vehicle</h3>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Vehicle Name</label>

                            <input  id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}"
                                required autocomplete="vehicle_name"
                                autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-sm m-0 mr-1 p-0">
                                <label for="vehicle_maker_id" class="col-md-4 col-form-label">Maker</label>

                                <select  id="vehicle_maker_id" type="text"
                                        class="custom-select @error('vehicle_maker_id') is-invalid @enderror"
                                        name="vehicle_maker_id" value="{{ old('vehicle_maker_id') }}"
                                        required>
                                    <option value="Null">Select</option>
                                    @foreach ($maker as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>

                                    @error('vehicle_maker_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <div class="col-sm m-0 ml-1 p-0">
                                <label for="manufacture_year" class="col-sm col-form-label">Manufacture Year</label>
                                <select  id="manufacture_year" type="text"
                                    class="custom-select @error('manufacture_year') is-invalid @enderror"
                                    name="manufacture_year" value="{{ old('manufacture_year') }}"
                                    required>
                                    <!-- Get Years -->
                                    @for ($i = date("Y"); $i > 1940; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>


                                @error('manufacture_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm m-0 mr-1 p-0">
                                <label for="Mileage" class="col-md-4 col-form-label">Mileage</label>
                                <input  id="Mileage" type="number"
                                class="form-control @error('mileage') is-invalid @enderror"
                                name="mileage" value="{{ old('mileage') }}"
                                required autocomplete="Mileage"
                                autofocus>

                                    @error('mileage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-sm m-0 ml-1 p-0">
                                <label for="price" class="col-md-4 col-form-label">Price</label>
                                <input  id="price" type="number"
                                class="form-control @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price') }}"
                                required autocomplete="price"
                                autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="vehicle_image" class="col-md-4 col-form-label">Vehicle Photo</label>
                            <div class="custom-file">
                                <input  id="vehicle_image" type="file" accept="image/*"
                                class="custom-file-input @error('vehicle_image') is-invalid @enderror"
                                id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"
                                name="vehicle_image" value="{{ old('vehicle_image') }}"
                                required autocomplete="vehicle_image"
                                autofocus>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <div id="image_prew">
                            </div>
                            @error('vehicle_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 m-0 p-0">
                                <button type="submit" class="btn btn-primary col-sm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/vehicles/create.js') }}"></script>
@endsection
