@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    <div style="margin-top: 100px">
    <div class="container">
        <div class="card mt-5" style="text-align: center; margin-top: 93px;">
            <div class="card-header">
                <h1 class="card-title text-center" >Modifications</h1>
            </div>

            @if(session('success'))
                <div class="card-body">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card-body">
                <table class="table" id="modifications-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vehicle</th>
                            <th>Vehicle Actual Price</th>
                            <th>Part Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Date Time</th>
                            <th>Modification Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modifications as $modification)
                            <tr>
                                <td>{{ $modification->id }}</td>
                                <td>{{ optional($modification->vehicle)->Make }}</td>
                                <td>{{ optional($modification->vehicle)->Amount }}</td>
                                <td>{{ $modification->part_name }}</td>
                                <td>{{ $modification->price }}</td>
                                <td>{{ $modification->description }}</td>
                                <td>{{ $modification->date_time }}</td>
                                <td>{{ $modification->totalAmount }}</td>

                                <td>
                                    <!-- Add links for edit and delete actions -->
                                    <a href="{{ route('modifications.edit', $modification->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('modifications.destroy', $modification->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this modification?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
