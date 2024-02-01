<?php dd($salaries); ?>
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="mt-4">
            <h1 class="text-center pt-4">Salaries</h1>
            <div class="m-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Salaries</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSalaryModal">
                                Add Salary
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SNo#</th>
                                    <th>User</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaries as $salary)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $salary->user_id }}</td>
                                        <td>{{ $salary->amount }}</td>
                                        <td>{{ $salary->date }}</td>
                                        <td>
                                            <a href="{{ route('salaries.edit', $salary->id) }}"
                                                class="btn btn-primary" data-toggle="modal" data-target="#editSalaryModal"
                                                onclick="openEditSalaryModal({{ $salary }})">
                                                Edit
                                            </a>
                                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                                style="display: inline;">
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

    <!-- Include scripts section -->
    @section('scripts')
        @include('salary.create')
        @include('salary.edit')
    @endsection
@endsection
