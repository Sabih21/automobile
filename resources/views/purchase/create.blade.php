@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 text-center my-auto">
                        <h1 style="font-weight:bold">Purchase Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <form action="{{ route('purchase.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <!-- Input Fields Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="membership_number">Membership #</label>
                                    <input type="text" name="membership_no" class="form-control"
                                        placeholder="Membership No.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="make">Make</label>
                                    <input type="text" name="make" class="form-control" placeholder="Make">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="model">Model</label>
                                    <input type="text" name="model" class="form-control" placeholder="Model">
                                </div>

                                <!-- Add more input fields as needed -->
                                <div class="mb-3">
                                    <label class="form-label" for="regis_no">Registration #</label>
                                    <input type="text" name="regis_no" class="form-control"
                                        placeholder="Registration No.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="serial_of_reg_book">Serial # of Reg Book</label>
                                    <input type="number" name="serial_of_reg_book" class="form-control"
                                        placeholder="Serial no. Reg Book">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="engine_no">Engine #</label>
                                    <input type="text" name="engine_no" class="form-control" placeholder="Engine No.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="chassis_no">Chassis #</label>
                                    <input type="text" name="chassis_no" class="form-control" placeholder="Chassis no.">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="colour">Colour</label>
                                    <input type="text" name="colour" class="form-control" placeholder="Colour">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="serial_of_reg_challan">Serial # of Reg Challan</label>
                                    <input type="text" name="serial_of_reg_challan" class="form-control"
                                        placeholder="Serial # of Reg Challan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="deal_locked">Deal Lock Amount</label>
                                    <input type="text" name="deal_locked" class="form-control" placeholder="Rs">
                                </div>
                                <!-- Other input field sections -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <label for="vehicle_id">Select Vehicle:</label>
                                <select name="vehicle_id" id="vehicle_id">
                                    foreach ($vehicles as $vehicle)
                                        <option value=" $vehicle->id }}">{ $vehicle->Make }} -
                                        { $vehicle->Registration }} - { $vehicle->Chassis }}</option>
                                    endforeach
                                </select>

                            </div>
                        </div> --}}

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Regd. Book</h5>
                                <input type="date" name="regd_book_date" class="form-control">
                            </div>
                        </div>

                        <!-- Add more checkboxes as needed -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Regd. File</h5>
                                <br>
                                <input type="date" name="regd_file_date" class="form-control">
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Document</h5>
                                <br>
                                <input type="date" name="documents_date" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="card col-md-6">
                                <div class="mb-3">
                                    <label for="jack_rod">Jack/Rod</label>
                                    <input type="checkbox" id="jack_rod" name="jackrod" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="wheel_caps">Wheel Caps</label>
                                    <input type="checkbox" id="wheel_caps" name="wheels_caps" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="service_book">Service Book</label>
                                    <input type="checkbox" id="service_book" name="service_book" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="tape_recorder">Tape Recorder</label>
                                    <input type="checkbox" id="tape_recorder" name="tape_recorder" value="yes">
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="mb-3">
                                    <label for="spare_wheel">Spare Wheel</label>
                                    <input type="checkbox" id="spare_wheel" name="spare_wheel" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="warranty_books">Warranty Books</label>
                                    <input type="checkbox" id="warranty_books" name="warranty_books" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="lighter">Cigarette Lighter</label>
                                    <input type="checkbox" id="lighter" name="lighter" value="yes">
                                </div>
                                <div class="mb-3">
                                    <label for="air_conditioner">Air Conditioner</label>
                                    <input type="checkbox" id="air_conditioner" name="air_conditioner" value="yes">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <label class="form-label" for="remarks">Remarks:</label>
                                    <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="deal_locked">Balance Rs</label>
                                    <input type="number" name="balance_rs" class="form-control" placeholder="Balance Rs">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="deal_locked">Advance Rs</label>
                                    <input type="number" name="advance_rs" class="form-control" placeholder="Advance Rs">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="deal_locked">Balanced Paid</label>
                                    <input type="number" name="balance_paid" class="form-control" placeholder="Balanced Rs">
                                </div>
                            </div>
                        </div>

                        <!-- Other checkbox sections -->

                    </div>

                    <div class="col-md-4">
                        <!-- File Uploads Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="car_image1">Car Image</label>
                                    <input type="file" name="car_image[]" class="form-control" multiple>
                                </div>

                                <!-- Add more file upload fields as needed -->

                                <div class="mb-3">
                                    <label class="form-label" for="cplc_image">CPLC</label>
                                    <input type="file" name="cplc_image[]" class="form-control"
                                        placeholder="Seller's Name" multiple>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="vehicle_image">Vehicle Documents/Images</label>
                                    <input type="file" name="vehicle_image[]" class="form-control" multiple>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="seller_cnic_image">Seller CNIC Image</label>
                                    <input type="file" name="seller_cnic_image[]" class="form-control" multiple>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="buyer_cnic_image">Buyer CNIC Image</label>
                                    <input type="file" name="buyer_cnic_image[]" class="form-control" multiple>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="car_touchups">Car Touch Ups</label>
                                    <input type="text" name="car_touchups" class="form-control"
                                        placeholder="Touch Ups">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="balance_inspection">Car Inspection</label>
                                    <input type="text" name="balance_inspection" class="form-control"
                                        placeholder="Car Inspection">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="owner_name">Owner's Name</label>
                                    <input type="text" name="owner_name" class="form-control"
                                        placeholder="Owner's name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="owner_address">Address</label>
                                    <input type="text" name="owner_address" class="form-control"
                                        placeholder="Address">
                                </div>

                                <!-- Other file upload sections -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Additional Form Fields -->
                        <div class="card mb-3">
                            <button type="submit" class="btn btn-primary">Create Purchase Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
