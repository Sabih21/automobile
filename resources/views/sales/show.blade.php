@extends('layouts.app')

@section('content')

<div class="content-wrapper">
        <div class="container" id="show">
            <h1 style="text-align: center; margin-bottom:12px; font-weight: bold">All Sale Cars</h1>
            @foreach ($saleOrders as $saleOrder)
        
                <div class="card mb-4" style="background-color:rgb(255, 255, 255);  border: 1px solid #c7bdbd;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @php
                                $carImages = $saleOrder->images->where('type', 'sale_car');
                                $firstCarImage = $carImages->isNotEmpty() ? $carImages->first()->path : 'https://via.placeholder.com/150';
                            @endphp
                        
                            <img src="{{ asset('storage/' . $firstCarImage) }}" style="width:500px; height:230px" alt="Car Image" class="img-thumbnail card-img">
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 30px; font-weight:bold"> Rs: {{ optional($saleOrder->vehicle)->Amount }}
                                </h5>
                                <p class="card-text" id="ctext-color">
                                    
                                    Buyer Name: {{ optional($saleOrder->customer)->name }}<br>
                                    Model: {{ optional($saleOrder->vehicle)->Model }}<br>
                                    Year: {{ optional($saleOrder->vehicle)->Year }}<br>


                                </p>
                                <a href="{{ route('sales.detail', $saleOrder->id) }}" class="btn btn"
                                    style="background:rgb(228, 38, 38); color:white;">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
