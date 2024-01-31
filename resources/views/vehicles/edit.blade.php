@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 text-center my-auto">
                        <h1>Add Vehicle</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Add Vehicles</h3>
                            </div>

                            <form method="POST" action="{{ route('vehicles.update', $vehicle->VehicleID) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT'){{-- Add this line to override the HTTP method --}}

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Make">Make:</label>
                                                <input type="text" name="Make" class="form-control"
                                                    value="{{ $vehicle->Make }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Model">Model:</label>
                                                <input type="text" name="Model" class="form-control"
                                                    value="{{ $vehicle->Model }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Year">Year:</label>
                                                <input type="number" name="Year" class="form-control"
                                                    value="{{ $vehicle->Year }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Color">Color:</label>
                                                <input type="text" name="Color" class="form-control"
                                                    value="{{ $vehicle->Color }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Registration">Registration:</label>
                                                <input type="text" name="Registration" class="form-control"
                                                    value="{{ $vehicle->Registration }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Amount">Amount:</label>
                                                <input type="text" name="Amount" class="form-control"
                                                    value="{{ $vehicle->Amount }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="LicensePlate">License Plate:</label>
                                                <input type="text" name="LicensePlate" class="form-control"
                                                    value="{{ $vehicle->LicensePlate }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="chasis">Chassis:</label>
                                                <input type="text" name="Chassis" class="form-control"
                                                    value="{{ $vehicle->Chassis }}" required>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            {{-- <div class="form-group">
                                                <label for="PurchasePrice">Purchase Price:</label>
                                                <input type="number" name="PurchasePrice" class="form-control"
                                                    value="{{ $vehicle->PurchasePrice }}" required>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <label for="CurrentValue">Current Value:</label>
                                                <input type="text" name="CurrentValue" class="form-control"
                                                    value="{{ $vehicle->CurrentValue }}" required>
                                            </div> --}}

                                            <div class="form-group">
                                                <label for="Condition">Condition:</label>
                                                <input type="text" name="Condition" class="form-control"
                                                    value="{{ $vehicle->Condition }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="FuelType">Fuel Type:</label>
                                                <input type="text" name="FuelType" class="form-control"
                                                    value="{{ $vehicle->FuelType }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Mileage">Mileage:</label>
                                                <input type="number" name="Mileage" class="form-control"
                                                    value="{{ $vehicle->Mileage }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="EngineNumber">Engine Number:</label>
                                                <input type="text" name="EngineNumber" class="form-control"
                                                    value="{{ $vehicle->EngineNumber }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Membership">Membership:</label>
                                                <input type="text" name="Membership" class="form-control"
                                                    value="{{ $vehicle->Membership }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Detail_description">Detail Description:</label>
                                                <input type="text" name="Detail_description" class="form-control"
                                                    value="{{ $vehicle->Detail_description }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Upload Images:</label>
                                            <input type="file" name="images[]" value="{{ $vehicle->images }}"
                                                class="form-control-file" multiple>
                                        </div>

                                        @if ($images->count() > 0)
                                            <div class="form-group">
                                                <label>Existing Images:</label>
                                                <div class="existing-images">
                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                            width="250px" alt="Vehicle Image" class="existing-image">
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
