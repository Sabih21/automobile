@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 text-center my-auto">
                        <h1 style="font-weight:bold">Sale Orders</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <!-- Sale Orders Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Membership #</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Registration #</th>
                                <th>Engine #</th>
                                <th>Chassis #</th>
                                <th>Color</th>
                                <th>Deal Lock Amount</th>
                                {{-- <th>Vehicle Name</th> --}}
                                <th>Buyer Name</th>
                                <th>Car Image</th>
                                <th>CPLC Image</th>
                                <th>Vehicle/Document Image</th>
                                <th>Seller CNIC Image</th>
                                <th>Buyer CNIC Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saleOrders as $saleOrder)
                                <tr>
                                    <td>{{ $saleOrder->id }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Membership }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Make }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Model }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Registration }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->EngineNumber }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Chassis }}</td>
                                    <td>{{ optional($saleOrder->vehicle)->Color }}</td>
                                    <td>{{ $saleOrder->deal_locked }}</td>
                                    {{-- <td>{{$saleOrder->vehicle_id}}</td> --}}
                                    <td>{{ optional($saleOrder->customer)->name }}</td>

                                    <td>
                                        @foreach ($saleOrder->images->where('type', 'sale_car') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($saleOrder->images->where('type', 'sale_cplc') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="CPLC Image"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($saleOrder->images->where('type', 'sale_vehicle') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Vehicle Image"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($saleOrder->images->where('type', 'sale_seller_cnic') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Seller CNIC Image"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($saleOrder->images->where('type', 'sale_buyer_cnic') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Buyer CNIC Image"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    
                                        <td>
                                            {{-- <a href="{ route('purchase.show', $purchaseOrder->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                            <a href="{{ route('sales.edit', $saleOrder->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('sales.destroy', $saleOrder->id) }}" method="POST" style="display: inline-block;">
                                                @csrf   
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
                                            </form>
                                        </td>

                                


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Sale Orders Table -->

            <!-- Pagination Links -->
            {{-- <div class="d-flex justify-content-center">
                { $saleOrders->links() }}
            </div> --}}
            <!-- End Pagination Links -->
        </div>
    </div>
@endsection
