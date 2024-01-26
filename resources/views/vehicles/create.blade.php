




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
                        <!-- /.card-header -->

                        <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Make">Make:</label>
                                            <input type="text" name="Make" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Model">Model:</label>
                                            <input type="text" name="Model" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Year">Year:</label>
                                            <input type="number" name="Year" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                          <label for="LicensePlate">License Plate:</label>
                                          <input type="text" name="LicensePlate" class="form-control" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="CurrentValue">Current Value:</label>
                                        <input type="text" name="CurrentValue" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="Condition">Condition:</label>
                                      <input type="text" name="Condition" class="form-control" required>
                                  </div>
                      
                                  <div class="form-group">
                                      <label for="FuelType">Fuel Type:</label>
                                      <input type="text" name="FuelType" class="form-control" required>
                                  </div>
                      
                                  <div class="form-group">
                                      <label for="Mileage">Mileage:</label>
                                      <input type="number" name="Mileage" class="form-control" required>
                                  </div>
                          
                                        <!-- Add more fields for the left column as needed -->
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Color">Color:</label>
                                            <input type="text" name="Color" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="VIN">VIN:</label>
                                            <input type="text" name="VIN" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Amount">Amount:</label>
                                            <input type="text" name="Amount" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                          <label for="PurchaseDate">Purchase Date:</label>
                                          <input type="date" name="PurchaseDate" class="form-control" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="PurchasePrice">Purchase Price:</label>
                                        <input type="number" name="PurchasePrice" class="form-control" required>
                                    </div>
                        
                                    <div class="form-group">
                                      <label for="EngineNumber">Engine Number:</label>
                                      <input type="text" name="EngineNumber" class="form-control" required>
                                  </div>
                      
                                  <div class="form-group">
                                      <label for="Transmission">Transmission:</label>
                                      <input type="text" name="Transmission" class="form-control" required>
                                  </div>
                      
                                  <div class="form-group">
                                      <label for="ManufacturerID">Manufacturer ID:</label>
                                      <input type="text" name="ManufacturerID" class="form-control" required>
                                  </div>
                      

                                        <!-- Add more fields for the right column as needed -->
                                    </div>
                                </div>

                                <!-- Common fields can be added outside the columns -->
                                <div class="form-group">
                                    <label for="images">Upload Images:</label>
                                    <input type="file" name="images[]" class="form-control-file" multiple>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Vehicle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
