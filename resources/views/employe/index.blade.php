@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div>
    
        <h1 style="text-align: center; margin-top: 93px;">Employees Information</h1>
     <!-- /.row -->
     <div class="row justify-content-center">
        
        <div class="col-11">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Employee Data</h3>
                
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    {{-- <th>ID</th> --}}
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                              {{-- <td>{{ $user->id }}</td> --}}
                       
                            <td>{{ $user->f_name }}</td>
                            <td>{{ $user->l_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                              <a href="{{ route('employe.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>

                                 <!-- Delete Button -->
                    <form action="{{ route('employe.destroy', ['id' => $user->id]) }}" method="post" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>

                            </td>

                            {{-- <td>{{ $user->user_type }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
</div>

@endsection