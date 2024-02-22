@extends('layouts.app')
                        
@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4 font-weight-bold">Customer List</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer List</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customerModal">
                                Add Customer
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>CNIC No</th>
                                    <th>Address</th>
                                    <th>Phone No</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->cnic_no }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone_no }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"
                                                onclick="editPerson({{ $customer->id }})" data-toggle="modal"
                                                data-target="#customerModal">
                                                Edit
                                            </button>

                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
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

    <!-- Modal for adding/editing a customer -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding/editing a customer -->
                    <form id="customerForm" action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="method" value="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cnic_no">CNIC No:</label>
                            <input type="text" name="cnic_no" id="cnic_no" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone No:</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-control">
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
            // Fetch the customer details using an AJAX request
            // Update the modal title, form action, and populate the form fields
            // Show the modal
            $('#customerModalLabel').text('Edit Customer');
            $('#customerForm').attr('action', 'customers/' + id);
            $('#method').val('PUT');

            // Fetch customer details and populate the form fields
            $.ajax({
                url: 'customers/' + id + '/edit',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#name').val(data.name);
                    $('#cnic_no').val(data.cnic_no);
                    $('#address').val(data.address);
                    $('#phone_no').val(data.phone_no);
                    $('#customerModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Reset the modal when it is closed
        $('#customerModal').on('hidden.bs.modal', function() {
            $('#customerModalLabel').text('Add Customer');
            $('#customerForm').attr('action', 'customers');
            $('#method').val('POST');
            $('#name').val('');
            $('#cnic_no').val('');
            $('#address').val('');
            $('#phone_no').val('');
        });

        function deletePerson(id) {
            if (confirm('Are you sure you want to delete this customer?')) {
                // Perform the delete action using Axios
                axios.delete('{{ url('customers') }}/' + id, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(function(response) {
                        alert('Customer deleted successfully!');
                        location.reload();
                    })
                    .catch(function(error) {
                        console.log(error);
                        alert('Error deleting customer. Please try again.');
                    });
            }
        }
    </script>
@endsection
