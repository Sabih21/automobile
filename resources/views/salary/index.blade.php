@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="container">
            <div class="card" style="margin-top:100px">
                <div class="card-body">
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#addSalaryModal">Add Salary</a>

                    @if (session('success'))
                        <div class="alert alert-danger mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Salary</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->user->name }}</td>
                                    <td>{{ $salary->salary }}</td>
                                    <td>{{ $salary->date }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editSalaryModal{{ $salary->id }}"
                                            data-salary-id="{{ $salary->id }}">Edit</a>
                                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this salary?')">Delete</button>
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

    <!-- Add Salary Modal -->
    <div class="modal fade" id="addSalaryModal" tabindex="-1" role="dialog" aria-labelledby="addSalaryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSalaryModalLabel">Add Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your form for adding salary goes here -->

                    <form id="addSalaryForm" action="{{ route('salaries.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">User:</label>
                            <select name="user_id" id="user_id_add" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->f_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="number" name="salary" id="salary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSalary()">Save Salary</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Salary Modals -->

    <!-- Edit Salary Modals -->
    @foreach ($salaries as $salary)
        <div class="modal fade" id="editSalaryModal{{ $salary->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editSalaryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSalaryModalLabel">Edit Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your form for editing salary goes here -->
                        <form id="editSalaryForm{{ $salary->id }}" action="{{ route('salaries.update', $salary->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">User:</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $salary->user_id ? 'selected' : '' }}>{{ $user->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" name="salary" id="salary" class="form-control"
                                    value="{{ $salary->salary }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" class="form-control"
                                    value="{{ $salary->date }}" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"
                            onclick="updateSalary({{ $salary->id }})">Update Salary</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
       function saveSalary() {
    // Add your logic for handling the form submission for adding salary
    document.getElementById('addSalaryForm').submit();
}

        function updateSalary(salaryId) {
            // Add your logic for handling the form submission for updating salary
            document.getElementById('editSalaryForm' + salaryId).submit();
        }
    </script>
@endsection
