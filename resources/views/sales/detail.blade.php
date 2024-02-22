@extends('layouts.app')

@section('content')
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Full-size Image</h5>
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
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title" style="font-size: 30px; font-weight: bold;">Sale Order Details</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Buyer Name:
                            <strong>  {{ $saleOrder->customer->name }}</strong>
                        </div>
                        <div class="form-group">
                            Membership No:
                            <strong>  {{ $saleOrder->vehicle->Membership }}</strong>
                        </div>

                        <div class="form-group">
                            Make:
                            <strong>  {{ $saleOrder->vehicle->Make }}</strong>
                        </div>
                        <div class="form-group">
                            Model:
                            <strong>  {{ $saleOrder->vehicle->Model }}</strong>
                        </div>
                        <div class="form-group">
                            Chassis No:
                            <strong>  {{ $saleOrder->vehicle->Chassis }}</strong>
                        </div>
                        <div class="form-group">
                            Colour:
                            <strong>  {{ $saleOrder->vehicle->Registration }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Serial of Reg Challan:
                            <strong>  {{ $saleOrder->serial_of_reg_challan }}</strong>
                        </div>
                        <div class="form-group">
                            Deal Locked:
                            <strong>  {{ $saleOrder->deal_locked }}</strong>
                        </div>
                        <div class="form-group">
                            Regd Book Date:
                            <strong>{{ $saleOrder->regd_book_date }}</strong>
                        </div>
                        <div class="form-group">
                            Regd File Date:
                            <strong> {{ $saleOrder->regd_file_date }}</strong>
                        </div>
                        <div class="form-group">
                            Documents Date:
                            <strong>  {{ $saleOrder->documents_date }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Continue with the remaining details and images -->

                <div class="row">
                    <div class="col-md-6">
                        <h3>Car Images</h3>
                        @foreach($saleOrder->images->where('type', 'sale_car') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}"  class="img-thumbnail clickable-image" alt="Car Image"  style="max-width: 250px; max-height: 200px;">
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h3>CPLC Image</h3>
                        @foreach($saleOrder->images->where('type', 'sale_cplc') as $image)
                            <img src="{{ asset('storage/' . $image->path) }}"  class="img-thumbnail clickable-image" alt="CPLC Image"  style="max-width: 250px; max-height: 200px;">
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h3>Vehicle Image</h3>
                            @foreach($saleOrder->images->where('type', 'sale_vehicle') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}"  class="img-thumbnail clickable-image" alt="Vehicle Image"  style="max-width: 250px; max-height: 200px;">
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h3>Seller CNIC Image</h3>
                            @foreach($saleOrder->images->where('type', 'sale_seller_cnic') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}"  class="img-thumbnail clickable-image" alt="Seller CNIC Image" style="max-width: 250px; max-height: 200px;">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h3>Buyer CNIC Image</h3>
                            @foreach($saleOrder->images->where('type', 'sale_buyer_cnic') as $image)
                                <img src="{{ asset('storage/' . $image->path) }}"  alt="Buyer CNIC Image"  class="img-thumbnail clickable-image" style="max-width: 250px; max-height: 200px;"> 
                            @endforeach
                        </div>
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
