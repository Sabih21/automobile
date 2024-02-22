@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4">Taxes List</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Taxes List</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#taxModal">
                                Add Taxes!
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle ID</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Rate</th>
                                    <th>Tax_Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tax as $tax)
                                    <tr>
                                        <td>{{ $tax->id }}</td>
                                        <td>{{ $tax->name }}</td>
                                        <td>{{ $tax->cnic_no }}</td>
                                        <td>{{ $tax->address }}</td>
                                        <td>{{ $tax->phone_no }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"
                                                onclick="editPerson({{ $tax->id }})" data-toggle="modal"
                                                data-target="#taxModal">
                                                Edit
                                            </button>

                                            <form action="{{ route('tax.destroy', $tax->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this Tax?')">Delete</button>
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
    </div>

    <!-- Modal for adding/editing a  -->
    <div class="modal fade" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="taxModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"taxModalLabel">Add Tax</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding/editing a  -->
                    <form id="taxForm" action="{{ route('tax.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="method" value="POST">
                        <div class="form-group">
                            <label for="ampunt">Amount:</label>
                            <input type="text" name="amount" id="amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="rate">Rate:</label>
                            <input type="text" name="rate" id="rate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tax_type">Tax Type:</label>
                            <input type="text" name="tax_type" id="tax_type" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function editPerson(id) {
                // Fetch the  details using an AJAX request
                // Update the modal title, form action, and populate the form fields
                // Show the modal
            $('#taxModalLabel').text('Edit tax');
            $('#taxForm').attr('action', 'tax/' + id);
            $('#method').val('PUT');

            // Fetch  details and populate the form fields
            $.ajax({
                url: 'tax/' + id + '/edit',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#amount').val(data.amount);
                    $('#date').val(data.date);
                    $('#rate').val(data.rate);
                    $('#tax_type').val(data.tax_type);
                    $('#taxModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Reset the modal when it is closed
        $('#taxModal').on('hidden.bs.modal', function() {
            $('#taxModalLabel').text('Add Tax');
            $('#taxForm').attr('action', 'tax');
            $('#method').val('POST');
            $('#amount').val('');
            $('#date').val('');
            $('#rate').val('');
            $('#tax_type').val('');
        });

        function deletePerson(id) {
            if (confirm('Are you sure you want to delete this tax?')) {
                // Perform the delete action using Axios
                axios.delete('{{ url('tax') }}/' + id, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(function(response) {
                        alert('tax deleted successfully!');
                        location.reload();
                    })
                    .catch(function(error) {
                        console.log(error);
                        alert('Error deleting tax. Please try again.');
                    });
            }
        }
    </script>
@endsection