@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 text-center my-auto">
                        <h1 style="font-weight:bold">Edit Sales Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <form action="{{ route('sales.update', $saleOrders->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <!-- Input Fields Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vehicle_id">Select Vehicle For Sale:</label>
                                    <select name="vehicle_id" class="form-control" required>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->VehicleID }}" {{ $vehicle->VehicleID === $saleOrders->vehicle_id ? 'selected' : '' }}>
                                                {{ $vehicle->Make }}- Registration No - {{ $vehicle->Registration }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer_id">Select Customer:</label>
                                    <select name="customer_id" class="form-control" required>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ $customer->id === $saleOrders->customer_id ? 'selected' : '' }}>
                                                {{ $customer->name }}- Cnic No - {{ $customer->cnic_no }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="serial_of_reg_book">Serial # of Reg Book</label>
                                    <input type="number" name="serial_of_reg_book" class="form-control"
                                        value="{{ $saleOrders->serial_of_reg_book }}" placeholder="Serial no. Reg Book">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="serial_of_reg_challan">Serial # of Reg Challan</label>
                                    <input type="text" name="serial_of_reg_challan" class="form-control"
                                        value="{{ $saleOrders->serial_of_reg_challan }}" placeholder="Serial # of Reg Challan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="deal_locked">Deal Lock Amount</label>
                                    <input type="text" name="deal_locked" class="form-control"
                                        value="{{ $saleOrders->deal_locked }}" placeholder="Rs">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="balance_rs">Balance Rs</label>
                                    <input type="number" name="balance_rs" value="{{ $saleOrders->balance_rs }}"
                                        class="form-control" placeholder="Balance Rs">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="advance_rs">Advance Rs</label>
                                    <input type="number" name="advance_rs" value="{{ $saleOrders->advance_rs }}"
                                        class="form-control" placeholder="Advance Rs">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="balance_paid">Balanced Paid</label>
                                    <input type="number" name="balance_paid" value="{{ $saleOrders->balance_paid }}"
                                        class="form-control" placeholder="Balanced Rs">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Date Inputs and Checkboxes Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Regd. Book</h5>
                                <input type="date" name="regd_book_date" value="{{ $saleOrders->regd_book_date }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Regd. File</h5>
                                <br>
                                <input type="date" name="regd_file_date" value="{{ $saleOrders->regd_file_date }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Original Document</h5>
                                <br>
                                <input type="date" name="documents_date" value="{{ $saleOrders->documents_date }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="card col-md-6">
                                <div class="mb-3">
                                    <label for="jack_rod">Jack/Rod</label>
                                    <input type="checkbox" id="jack_rod" name="jackrod" value="yes"
                                           {{ $saleOrders->jackrod == 'yes' ? 'checked' : '' }}>
                                </div>
                                <div class="mb-3">
                                    <label for="wheel_caps">Wheel Caps</label>
                                    <input type="checkbox" id="wheel_caps" name="wheels_caps" value="yes"
                                           {{ $saleOrders->wheels_caps == 'yes' ? 'checked' : '' }}>
                                </div>
                                <div class="mb-3">
                                    <label for="service_book">Service Book</label>
                                    <input type="checkbox" id="service_book" name="service_book" value="yes"
                                           {{ $saleOrders->service_book == 'yes' ? 'checked' : '' }}>
                                </div>
                                <div class="mb-3">
                                    <label for="tape_recorder">Tape Recorder</label>
                                    <input type="checkbox" id="tape_recorder" name="tape_recorder" value="yes"
                                           {{ $saleOrders->tape_recorder == 'yes' ? 'checked' : '' }}>
                                </div>
                            </div>
                            
                            <div class="card col-md-6">
                                <div class="mb-3">
                                    <label for="spare_wheel">Spare Wheel</label>
                                    <input type="checkbox" id="spare_wheel" name="spare_wheel" value="yes"
                                        {{ $saleOrders->spare_wheel === 'yes' ? 'checked' : '' }} >
                                </div>
                                <div class="mb-3">
                                    <label for="warranty_books">Warranty Books</label>
                                    <input type="checkbox" id="warranty_books" name="warranty_books" value="yes"
                                        {{ $saleOrders->warranty_books === 'yes' ? 'checked' : '' }} >
                                </div>
                                <div class="mb-3">
                                    <label for="lighter">Cigarette Lighter</label>
                                    <input type="checkbox" id="lighter" name="lighter" value="yes"
                                        {{ $saleOrders->lighter === 'yes' ? 'checked' : '' }} >
                                </div>
                                <div class="mb-3">
                                    <label for="air_conditioner">Air Conditioner</label>
                                    <input type="checkbox" id="air_conditioner" name="air_conditioner" value="yes"
                                        {{ $saleOrders->air_conditioner === 'yes' ? 'checked' : '' }} >
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <label class="form-label" for="remarks">Remarks:</label>
                                    <textarea name="remarks" class="form-control"
                                        placeholder="Remarks">{{ $saleOrders->remarks }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- File Uploads Section -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="car_image1">Car Image</label>
                                    <input type="file" name="sale_car_image[]" class="form-control" multiple>
                                </div>
                                @foreach ($saleOrders->images->where('type', 'sale_car') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail" style="width:100px">
                            @endforeach
                                <!-- Add more file upload fields as needed -->

                                <div class="mb-3">
                                    <label class="form-label" for="cplc_image">CPLC</label>
                                    <input type="file" name="sale_cplc_image[]" class="form-control" multiple>
                                </div>
                                @foreach ($saleOrders->images->where('type', 'sale_cplc') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail" style="width:100px">
                            @endforeach
                                <div class="mb-3">
                                    <label class="form-label" for="vehicle_image">Vehicle Documents/Images</label>
                                    <input type="file" name="sale_vehicle_image[]" class="form-control" multiple>
                                </div>
                                @foreach ($saleOrders->images->where('type', 'sale_vehicle') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail" style="width:100px">
                            @endforeach
                                <div class="mb-3">
                                    <label class="form-label" for="seller_cnic_image">Seller CNIC Image</label>
                                    <input type="file" name="sale_seller_cnic_image[]" class="form-control" multiple>
                                </div>
                                @foreach ($saleOrders->images->where('type', 'sale_seller_cnic') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail" style="width:100px">
                            @endforeach
                                <div class="mb-3">
                                    <label class="form-label" for="buyer_cnic_image">Buyer CNIC Image</label>
                                    <input type="file" name="sale_buyer_cnic_image[]" class="form-control" multiple>
                                </div>
                                @foreach ($saleOrders->images->where('type', 'sale_buyer_cnic') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail" style="width:100px">
                            @endforeach
                                <div class="mb-3">
                                    <label class="form-label" for="car_touchups">Car Touch Ups</label>
                                    <input type="text" name="car_touchups" value="{{ $saleOrders->car_touchups }}"
                                        class="form-control" placeholder="Touch Ups">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="balance_inspection">Car Inspection</label>
                                    <input type="text" name="balance_inspection"
                                        value="{{ $saleOrders->balance_inspection }}" class="form-control"
                                        placeholder="Car Inspection">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="owner_name">Owner's Name</label>
                                    <input type="text" name="owner_name" value="{{ $saleOrders->owner_name }}"
                                        class="form-control" placeholder="Owner's name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="owner_address">Address</label>
                                    <input type="text" name="owner_address" value="{{ $saleOrders->owner_address }}"
                                        class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Additional Form Fields -->
                        <div class="card mb-3">
                            <button type="submit" class="btn btn-primary">Update Sales Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
