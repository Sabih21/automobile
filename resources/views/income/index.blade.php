@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4 font-weight-bold">Income Detail</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Income Detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIncomeModal">
                                Add Income 
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SNo#</th>
                                    <th>Source</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomes as $income)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $income->source }}</td>
                                        <td>{{ $income->date }}</td>
                                        <td>{{ $income->amount }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="openEditModal({{ $income }})" data-toggle="modal"
                                                data-target="#editIncomeModal">
                                                Edit
                                            </button>

                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteIncomeConfirmation({{ $income->id }})">
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
@endsection
@section('scripts')
    @include('income.create')
    @include('income.edit')
    <script>
        $(document).ready(function() {
            $('#addIncomeModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var modal = $(this)
                modal.find('.modal-title').text('Add Income')
            });
        });

        function deleteIncomeConfirmation(id) {
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
                        url: '{{ url('incomes') }}/' + id,
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
                            Swal.fire('Error!',
                                'Something went wrong. Please try again later.',
                                'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
