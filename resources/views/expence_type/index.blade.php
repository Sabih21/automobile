
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4">Expense Types</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expense Types</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExpenseTypeModal">
                                Add Expense Type
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SNo#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseTypes as $expenseType)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expenseType->title }}</td>
                                        <td>
                                            <a href="{{ route('expence_types.edit', $expenseType->id) }}"
                                                class="btn btn-primary" onclick="openEditExpenseTypeModal({{ $expenseType }})" data-toggle="modal" data-target="#editExpenseTypeModal">
                                                Edit
                                            </a>
                                            <form action="{{ route('expence_types.destroy', $expenseType->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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

    @section('scripts')
        @include('expence_type.create')
        @include('expence_type.edit')
    @endsection
@endsection
