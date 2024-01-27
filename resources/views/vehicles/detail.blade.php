@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title" style="font-size:30px; font-weight:bold;">Vehicle Details</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Make:</strong>
                            {{ $vehicle->Make }}
                        </div>
                        <div class="form-group">
                            <strong>Model:</strong>
                            {{ $vehicle->Model }}
                        </div>
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $vehicle->Year }}
                        </div>
                        <div class="form-group">
                            <strong>Vin:</strong>
                            {{ $vehicle->VIN }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $vehicle->Amount }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $vehicle->Color }}
                        </div>
                        <div class="form-group">
                            <strong>LicensePlate:</strong>
                            {{ $vehicle->LicensePlate }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>PurchaseDate:</strong>
                            {{ $vehicle->PurchaseDate }}
                        </div>
                        <div class="form-group">
                            <strong>PurchasePrice:</strong>
                            {{ $vehicle->PurchasePrice }}
                        </div>
                        <div class="form-group">
                            <strong>CurrentValue:</strong>
                            {{ $vehicle->CurrentValue }}
                        </div>
                        <div class="form-group">
                            <strong>Condition:</strong>
                            {{ $vehicle->Condition }}
                        </div>
                        <div class="form-group">
                            <strong>FuelType:</strong>
                            {{ $vehicle->FuelType }}
                        </div>
                        <div class="form-group">
                            <strong>Mileage:</strong>
                            {{ $vehicle->Mileage }}
                        </div>
                        <div class="form-group">
                            <strong>EngineNumber:</strong>
                            {{ $vehicle->EngineNumber }}
                        </div>
                        <div class="form-group">
                            <strong>Transmission:</strong>
                            {{ $vehicle->Transmission }}
                        </div>
                    </div>
                    <!-- Add more details as needed -->

                    @if ($images->count() > 0)
                        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block"
                                            height="150px" width="250px" alt="Vehicle Image">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
