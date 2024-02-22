@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container" id="show">
            @foreach ($purchaseOrders as $purchaseOrder)
                <div class="card mb-4" style="background-color:rgb(255, 255, 255);  border: 1px solid #c7bdbd;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @php
                                $carImages = $purchaseOrder->images->where('type', 'car');
                                $firstCarImage = $carImages->isNotEmpty() ? $carImages->first()->path : 'https://via.placeholder.com/150';
                            @endphp
                        
                            <img src="{{ asset('storage/' . $firstCarImage) }}" alt="Car Image" class="img-thumbnail card-img">
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 30px; font-weight:bold"> Rs: {{ $purchaseOrder->balance_rs }}
                                </h5>
                                <p class="card-text" id="ctext-color">
                                    
                                    Model: {{ $purchaseOrder->model }}<br>
                                    Make: {{ $purchaseOrder->make }}<br>
                                    Engine: {{ $purchaseOrder->engine_no }}<br>


                                </p>
                                <a href="{{ route('purchase.detail', $purchaseOrder->id) }}" class="btn btn"
                                    style="background:rgb(228, 38, 38); color:white;">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


