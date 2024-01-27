@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    <div>
    
        <h1 style="text-align: center; margin-top: 93px;">Car Informations</h1>
     <!-- /.row -->
     <div class="row justify-content-center">
        
        <div class="col-11">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Car Data</h3>
                
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
          <th>VIN</th>
          <th>Amount</th>
          <th>License Plate</th>
          <th>Purchase Data</th>
          <th>Purchase Price</th>
          <th>Current Value</th>
          <th>Condition</th>
          <th>Fuel Type</th>
          <th>Mileage</th>
          <th>Engine Number</th>
          <th>Transmission</th>
          <th>Manufacture ID</th>
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
                  <td>{{ $vehicle->VIN }}</td>
                  <td>{{ $vehicle->Amount }}</td>
                  <td>{{ $vehicle->LicensePlate }}</td>
                  <td>{{ $vehicle->PurchaseDate }}</td>
                  <td>{{ $vehicle->PurchasePrice }}</td>
                  <td>{{ $vehicle->CurrentValue }}</td>
                  <td>{{ $vehicle->Condition }}</td>
                  <td>{{ $vehicle->FuelType }}</td>
                  <td>{{ $vehicle->Mileage }}</td>
                  <td>{{ $vehicle->EngineNumber }}</td>
                  <td>{{ $vehicle->Transmission }}</td>
                  <td>{{ $vehicle->ManufacturerID }}</td>
                  <td>
                    @foreach ($vehicle->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Vehicle Image" style="max-width: 100px; max-height: 100px;">
                    @endforeach
                </td> 
                  <td>
                    <a href="{{ route('vehicles.edit', ['id' => $vehicle->VehicleID]) }}" class="btn btn-primary">Edit</a>

                       <!-- Delete Button -->
          <form action="{{ route('vehicles.destroy', ['id   ' => $vehicle->VehicleID]) }}" method="post" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
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