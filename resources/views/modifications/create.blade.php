@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="card" style="margin-top:120px">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold">Add Vehicle Modification</h1>
                </div>

                @if (session('success'))
                    <div class="card-body">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('modifications.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="vehicle_id">Vehicle:</label>
                            <select name="vehicle_id" class="form-control" required>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->VehicleID }}">{{ $vehicle->Make }}- Registration No -
                                        {{ $vehicle->Registration }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="modifications-container">
                            <div class="modification-field">
                                <div class="form-group">
                                    <label for="part_name">Part Name:</label>
                                    <input type="text" name="part_name[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="text" name="price[]" class="form-control" required>
                                </div>
                                <button type="button" class="remove-modification btn btn-danger">Remove</button>
                            </div>
                        </div>

                        <button type="button" class="btn btn-success mt-2" id="add-modification">Add Modification</button>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_time">Date Time:</label>
                            <input type="datetime-local" name="date_time" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('modifications-container');
            const addModificationBtn = document.getElementById('add-modification');

            addModificationBtn.addEventListener('click', function() {
                const modificationField = document.createElement('div');
                modificationField.classList.add('modification-field');
                modificationField.innerHTML = `
                <div class="form-group">
                    <label for="part_name">Part Name:</label>
                    <input type="text" name="part_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price[]" class="form-control" required>
                </div>
                <button type="button" class="remove-modification btn btn-danger">Remove</button>
            `;
                container.appendChild(modificationField);
            });

            container.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-modification')) {
                    event.target.closest('.modification-field').remove();
                }
            });
        });
    </script>
@endsection
