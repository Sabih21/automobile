@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container" id="show">
            @foreach ($vehicles as $vehicle)
                <div class="card mb-4" style="background-color:rgb(255, 255, 255);  border: 1px solid #c7bdbd;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @if ($vehicle->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $vehicle->images->first()->image_path) }}" class="card-img"
                                    alt="Vehicle Image">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img" alt="Placeholder Image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 30px; font-weight:bold"> Rs: {{ $vehicle->Amount }}
                                </h5>
                                <p class="card-text" id="ctext-color">

                                    Model: {{ $vehicle->Model }}<br>
                                    Year: {{ $vehicle->Year }}<br>
                                    Color: {{ $vehicle->Color }}<br>


                                </p>
                                <a href="{{ route('vehicles.detail', $vehicle->VehicleID) }}" class="btn btn"
                                    style="background:rgb(228, 38, 38); color:white;">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
