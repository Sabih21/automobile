@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <div>

            <h1 style="text-align: center; margin-top: 93px;" class="font-weight-bold">Car Informations</h1>
            <!-- /.row -->
            <div class="row justify-content-center">

                <div class="col-11">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Car Data</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">   
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Color</th>
                                        <th>Registration</th>
                                        <th>Amount</th>
                                        <th>License Plate</th>
                                        <th>Chassis</th>
                                        <th>Condition</th>
                                        <th>Fuel Type</th>
                                        <th>Mileage</th>
                                        <th>Engine Number</th>
                                        <th>Membership</th>
                                        <th>Detail Description</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle as $vehicle)
                                        <tr>
                                            {{-- <td>{{ $user->id }}</td> --}}

                                            <td>{{ $vehicle->VehicleID }}</td>
                                            <td>{{ $vehicle->Make }}</td>
                                            <td>{{ $vehicle->Model }}</td>
                                            <td>{{ $vehicle->Year }}</td>
                                            <td>{{ $vehicle->Color }}</td>
                                            <td>{{ $vehicle->Registration }}</td>
                                            <td>{{ $vehicle->Amount }}</td>
                                            <td>{{ $vehicle->LicensePlate }}</td>
                                            <td>{{ $vehicle->Chassis }}</td>
                                            <td>{{ $vehicle->Condition }}</td>
                                            <td>{{ $vehicle->FuelType }}</td>
                                            <td>{{ $vehicle->Mileage }}</td>
                                            <td>{{ $vehicle->EngineNumber }}</td>
                                            <td>{{ $vehicle->Membership }}</td>
                                            <td>{{ $vehicle->Detail_description }}</td>
                                            <td>
                                                @foreach ($vehicle->images as $image)
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                        alt="Vehicle Image" style="max-width: 100px; max-height: 100px;">
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('vehicles.edit', ['id' => $vehicle->VehicleID]) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <!-- Delete Button -->
                                                <form
                                                    action="{{ route('vehicles.destroy', ['id' => $vehicle->VehicleID]) }}"
                                                    method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure to delete this?')">Delete</button>
                                                </form>

                                            </td>

                                            {{-- <td>{{ $user->user_type }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
