@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-8 text-center my-auto">
            <h1 class="font-weight-bold">Add Employees</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Add Employees</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('employe.store') }}">
                @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="f_name" placeholder="Enter First Name">
                  </div>
                  <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group">
                    <label for="email">Enter Email </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-describedby="showPasswordBtn">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">Show</button>
                        </div>
                    </div>
                </div>
                

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <!-- /.card -->
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



{{-- <div class="form-group">
  <label for="exampleInputFile">File input</label>
  <div class="input-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="exampleInputFile">
      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
    <div class="input-group-append">
      <span class="input-group-text" id="">Upload</span>
    </div>
  </div>
</div> --}}