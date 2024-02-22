@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4">Expense Detail</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expense Detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExpenceModal">
                                Add Expense
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SNo#</th>
                                    <th>Expense Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expence->expenceType->title }}</td>
                                        <td>{{ $expence->amount }}</td>
                                        <td>{{ $expence->date }}</td>
                                        <td>{{ $expence->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="openEditExpenceModal({{ $expence }})" data-toggle="modal"
                                                data-target="#editExpenceModal">
                                                Edit
                                            </button>

                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteExpenceConfirmation({{ $expence->id }})">
                                                Delete
                                            </button>
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

    <!-- Include scripts section -->
    @section('scripts')
        @include('expence.create')
        @include('expence.edit')

        <script>
            $(document).ready(function() {
                $('#addExpenceModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var modal = $(this)
                    modal.find('.modal-title').text('Add Expense')
                });
            });

            function deleteExpenceConfirmation(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: '{{ url('expences') }}/' + id,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                                location.reload();
                            },
                            error: function(error) {
                                Swal.fire('Deleted!',
                                    'Deleted!.',
                                    'Deleted');
                            }
                        });
                    }
                });
            }
        </script>
    @endsection
@endsection
