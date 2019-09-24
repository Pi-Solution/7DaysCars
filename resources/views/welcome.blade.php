
@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
@endsection
@section('container')
    <div class="container-fluid p-0 m-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">7DaysCars</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                            @if (Route::has('login'))
                            @auth
                            <div class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">My Vehicles <span class="sr-only">(current)</span></a>
                            </div>
                            @endif
                        <li class="nav-item active">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        @if (Route::has('login'))
                            @else
                            <div class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                            </div>

                                @if (Route::has('register'))
                                    <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        @endif
                      </form>
                    </div>
                  </nav>
    </div>
@endsection

