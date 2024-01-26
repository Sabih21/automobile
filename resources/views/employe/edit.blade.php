@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-8 text-center my-auto">
                    <h1>Edit Employee</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Employee</h3>
                        </div>
                        <form method="POST" action="{{ route('employe.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="f_name"
                                        placeholder="Enter First Name" value="{{ $user->f_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" class="form-control" id="l_name" name="l_name"
                                        placeholder="Enter Last Name" value="{{ $user->l_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Enter Email </label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Phone Number" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" value="{{ $user->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password"
                                            aria-describedby="showPasswordBtn">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="showPasswordBtn">Show</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $("#showPasswordBtn").on("click", function () {
            var passwordField = $("#exampleInputPassword1");
            var passwordFieldType = passwordField.attr('type');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $("#showPasswordBtn").text('Hide');
            } else {
                passwordField.attr('type', 'password');
                $("#showPasswordBtn").text('Show');
            }
        });
    });
</script>

@endsection
