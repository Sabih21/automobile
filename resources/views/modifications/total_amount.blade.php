<!-- resources/views/final_prices.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <h1 class="mt-5">Final Prices</h1>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Final Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($finalPrices as $vehicleId => $finalPrice)
                        <tr>
                            <td>{{ $vehicleId }}</td>
                            <td>{{ $finalPrice }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No final prices available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
