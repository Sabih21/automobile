@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="fullSizeImage" src="" alt="Full-size Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1 class="card-title" style="font-size: 30px; font-weight: bold;">Purchase Order Details</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Membership No:
                            <strong>  {{ $purchaseOrder->membership_no }}</strong>
                        </div>
                        <div class="form-group">
                       Make:</strong>
                            <strong>  {{ $purchaseOrder->make }}</strong>
                        </div>
                        <div class="form-group">
                            Model:</strong>
                            <strong>  {{ $purchaseOrder->model }}</strong>
                        </div>
                        <div class="form-group">
                            Chassis No:
                            <strong>  {{ $purchaseOrder->chassis_no }}</strong>
                        </div>
                        <div class="form-group">
                            Colour:
                            <strong>  {{ $purchaseOrder->colour }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Serial of Reg Challan:
                            <strong>  {{ $purchaseOrder->serial_of_reg_challan }}</strong>
                        </div>
                        <div class="form-group">
                            Deal Locked:
                            <strong>  {{ $purchaseOrder->deal_locked }}</strong>
                        </div>
                        <div class="form-group">
                          Regd Book Date:
                            <strong>{{ $purchaseOrder->regd_book_date }}</strong>
                        </div>
                        <div class="form-group">
                            Regd File Date:
                            <strong> {{ $purchaseOrder->regd_file_date }}</strong>
                        </div>
                        <div class="form-group">
                            Documents Date:
                            <strong>  {{ $purchaseOrder->documents_date }}</strong>
                        </div>
                     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Regis No:
                            <strong>{{ $purchaseOrder->regis_no }}</strong>
                        </div>
                        <div class="form-group">
                            Serial of Reg Book:
                            <strong>{{ $purchaseOrder->serial_of_reg_book }}</strong>
                        </div>
                        <div class="form-group">
                            Engine No:
                            <strong> {{ $purchaseOrder->engine_no }}</strong>
                        </div>
                        <div class="form-group">
                            Warranty Books:
                            <strong> {{ $purchaseOrder->warranty_books }}</strong>
                        </div>
                       
                        <div class="form-group">
                            remarks:
                            <strong> {{ $purchaseOrder->remarks }}</strong>
                        </div>
                        <div class="form-group">
                            Balance Rs:
                            <strong> {{ $purchaseOrder->balance_paid }}</strong>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Owner Name:
                            <strong> {{ $purchaseOrder->owner_name }}</strong>
                        </div>
                        <div class="form-group">
                            Owner Address:
                            <strong> {{ $purchaseOrder->owner_address }}</strong>
                        </div> 
                        <div class="form-group">
                            Car Touchups:
                            <strong> {{ $purchaseOrder->car_touchups }}</strong>
                        </div>
                        <div class="form-group">
                            Balance Inspection:
                            <strong> {{ $purchaseOrder->balance_inspection }}</strong>
                        </div>
                        <div class="form-group">
                            Balance Rs:
                            <strong> {{ $purchaseOrder->balance_rs }}</strong>
                        </div>
                        <div class="form-group">
                            Advance Rs:
                            <strong> {{ $purchaseOrder->advance_rs }}</strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>Car Images</h3>
                        @foreach($purchaseOrder->images->where('type', 'car') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" class="img-thumbnail clickable-image" style="max-width: 125px; max-height: 120px;">
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h3>CPLC Image</h3>
                        @foreach($purchaseOrder->images->where('type', 'cplc') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="CPLC Image" class="img-thumbnail clickable-image" style="max-width: 125px; max-height: 120px;">
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>Vehicle Image</h3>
                        @foreach($purchaseOrder->images->where('type', 'vehicle') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Vehicle Image" class="img-thumbnail clickable-image" style="max-width: 125px; max-height: 120px;">
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h3>Seller CNIC Image</h3>
                        @foreach($purchaseOrder->images->where('type', 'seller_cnic') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Seller CNIC Image" class="img-thumbnail clickable-image" style="max-width: 125px; max-height: 120px;">
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>Buyer CNIC Image</h3>
                        @foreach($purchaseOrder->images->where('type', 'buyer_cnic') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Buyer CNIC Image" class="img-thumbnail clickable-image" style="max-width: 125px; max-height: 120px;"> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // JavaScript to handle image click and show modal
        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.clickable-image');

            images.forEach(image => {
                image.addEventListener('click', function () {
                    const imageUrl = this.src;
                    document.getElementById('fullSizeImage').src = imageUrl;
                    $('#imageModal').modal('show');
                });
            });
        });
    </script> 
@endsection
