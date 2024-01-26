@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        @foreach ($vehicles as $vehicle)
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if ($vehicle->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $vehicle->images->first()->image_path) }}" class="card-img" alt="Vehicle Image">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img" alt="Placeholder Image">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->Make }} {{ $vehicle->Model }}</h5>
                            <p class="card-text">
                                <!-- Other vehicle details -->
                                Year: {{ $vehicle->Year }}<br>
                                Color: {{ $vehicle->Color }}<br>
                                <!-- Add more details as needed -->
                            </p>
                            <a href="{{ route('vehicles.detail', $vehicle->VehicleID) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
