<!-- resources/views/instalment_history/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Instalment History</h2>

        <!-- Button to Open Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInstalmentModal">
            Add Instalment
        </button>

        <!-- Instalment History Table -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle ID</th>
                    <th>Sale Order ID</th>
                    <th>Amount Per Month</th>
                    <th>Remaining Balance</th>
                    <th>Recovery Date</th>
                    <th>File Transfer</th>
                </tr>
            </thead>
            <tbody id="instalmentHistoryTableBody">
                <!-- Display Instalment History Data Here -->
            </tbody>
        </table>
    </div>

    <!-- Add Instalment Modal -->
    <div class="modal" id="addInstalmentModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Instalment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Form to Add Instalment -->
                    <form id="addInstalmentForm">
                       <!-- Your Blade View File -->

<!-- Dropdown for Vehicle -->
<div class="mb-3">
    <label for="vehicle_id">Select Vehicle:</label>
    <select name="vehicle_id" class="form-control" required>
        @foreach ($vehicles as $vehicle)
            <option value="{{ $vehicle->VehicleID }}">{{ $vehicle->Make }} - Registration No - {{ $vehicle->Registration }}</option>
        @endforeach
    </select>
</div>

<!-- Dropdown for Sale Order -->
<div class="mb-3">
    <label for="sale_order_id">Select Sale Order:</label>
    <select name="sale_order_id" class="form-control" required>
        @foreach ($saleOrders as $saleOrder)
            <option value="{{ $saleOrder->id }}">{{ $saleOrder->id }}</option>
        @endforeach
    </select>
</div>

                        <div class="mb-3">
                            <label for="amount_p_month">Amount Per Month:</label>
                            <input type="text" name="amount_p_month" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="remaining_balance">Remaining Balance:</label>
                            <input type="text" name="remaining_balance" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="recovery_date">Recovery Date:</label>
                            <input type="date" name="recovery_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="file_transfer">File Transfer:</label>
                            <input type="file" name="file_transfer" class="form-control" required>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addInstalment()">Add Instalment</button>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript to Handle Instalment Addition and Data Fetching -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to Add Instalment
        function addInstalment() {
            // Prepare data from the form
            var formData = new FormData($('#addInstalmentForm')[0]);

            // Perform AJAX request to add instalment
            $.ajax({
                type: 'POST',
                url: '{{ route("instalment-history.store") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // If the request is successful, update the table with the new data
                    fetchInstalmentHistory();

                    // Close the modal
                    $('#addInstalmentModal').modal('hide');
                },
                error: function (error) {
                    console.error('Error adding instalment:', error);
                    // Handle error appropriately (show an alert, etc.)
                }
            });
        }

        // Function to Fetch Instalment History Data
      // Function to Fetch Instalment History Data
function fetchInstalmentHistory() {
    // Perform AJAX request to fetch instalment history data
    $.ajax({
        type: 'GET',
        url: '{{ route("instalment-history.index") }}', // Adjust the route according to your Laravel setup
        success: function (response) {
            // Assuming the response contains an array of instalment objects
            var instalmentData = response.data;

            // Clear existing table rows
            $('#instalmentHistoryTableBody').empty();

            // Loop through instalmentData and append rows to the table
            instalmentData.forEach(function (instalment) {
                var row = '<tr>' +
                    '<td>' + instalment.id + '</td>' +
                    '<td>' + instalment.vehicle_id + '</td>' +
                    '<td>' + instalment.sale_order_id + '</td>' +
                    '<td>' + instalment.amount_p_month + '</td>' +
                    '<td>' + instalment.remaining_balance + '</td>' +
                    '<td>' + instalment.recovery_date + '</td>' +
                    '<td>' + instalment.file_transfer + '</td>' +
                    '</tr>';
                $('#instalmentHistoryTableBody').append(row);
            });
        },
        error: function (error) {
            console.error('Error fetching instalment history:', error);
            // Handle error appropriately (show an alert, etc.)
        }
    });
}

        // Fetch Instalment History on Page Load
        $(document).ready(function () {
            fetchInstalmentHistory();
        });
    </script>
@endsection
