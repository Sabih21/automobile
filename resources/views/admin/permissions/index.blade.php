@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div>

            <h1 style="text-align: center; margin-top: 93px;">Admin Permissions</h1>
            <!-- /.row -->
            <div class="row justify-content-center">

                <div class="col-11">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin Permissions</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#createPermissionModal">
                                        Create Permissions
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            {{-- <a class="btn btn-primary" href="">Edit</a> --}}
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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

    <!-- Create Permission Modal -->
    <div class="modal fade" id="createPermissionModal" tabindex="-1" permission="dialog"
        aria-labelledby="createPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog" permission="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPermissionModalLabel">Create Permissions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Permission Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


