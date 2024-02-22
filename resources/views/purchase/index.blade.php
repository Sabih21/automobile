@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 text-center my-auto">
                        <h1 style="font-weight:bold">Purchase Orders</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <!-- Purchase Orders Table -->
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
                                <th>Car Image</th>
                                <th>CPLC Image</th>
                                <th>Vehicle/Document Image</th>
                                <th>Seller CNIC Image</th>
                                <th>Buyer CNIC Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseOrders as $purchaseOrder)
                                <tr>
                                    <td>{{ $purchaseOrder->id }}</td>
                                    <td>{{ $purchaseOrder->membership_no }}</td>
                                    <td>{{ $purchaseOrder->make }}</td>
                                    <td>{{ $purchaseOrder->model }}</td>
                                    <td>{{ $purchaseOrder->regis_no }}</td>
                                    <td>{{ $purchaseOrder->engine_no }}</td>
                                    <td>{{ $purchaseOrder->chassis_no }}</td>
                                    <td>{{ $purchaseOrder->colour }}</td>
                                    <td>{{ $purchaseOrder->deal_locked }}</td>
                                    <td>
                                        @foreach($purchaseOrder->images->where('type', 'car') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Car Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($purchaseOrder->images->where('type', 'cplc') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="CPLC Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($purchaseOrder->images->where('type', 'vehicle') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Vehicle Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($purchaseOrder->images->where('type', 'seller_cnic') as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Seller CNIC Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($purchaseOrder->images->where('type', 'buyer_cnic') as $image)
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Buyer CNIC Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        {{-- <a href="{ route('purchase.show', $purchaseOrder->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                        <a href="{{ route('purchase.edit', $purchaseOrder->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('purchase.destroy', $purchaseOrder->id) }}" method="POST" style="display: inline-block;">
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
            <!-- End Purchase Orders Table -->

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $purchaseOrders->links() }}
            </div>
            <!-- End Pagination Links -->
        </div>
    </div>
@endsection
