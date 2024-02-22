<!-- resources/views/modifications/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <h1>Edit Modification</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('modifications.update', $modification->id) }}" method="post">
                @csrf
                @method('PUT')

             
            <div class="form-group">
                <label for="vehicle_id">Vehicle:</label>
                <select name="vehicle_id" class="form-control" required>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->VehicleID }}">{{ $vehicle->Make }}</option>
                    @endforeach
                </select>
            </div>

                <div id="modifications-container">
                    <div class="modification-field">
                        <div class="form-group">
                            <label for="part_name">Part Name:</label>
                            <input type="text" name="part_name" class="form-control" value="{{ $modification->part_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" name="price" class="form-control" value="{{ $modification->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" class="form-control" value="{{ $modification->description }}">
                        </div>
                        <div class="form-group">
                            <label for="date_time">Date Time:</label>
                            <input type="datetime-local" name="date_time" class="form-control" >
                        </div>               
                         </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Modification</button>
            </form>
        </div>
    </div>
@endsection
