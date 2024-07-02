@extends('layouts.app')

@section('content')
    {{-- <h1>Create User</h1> --}}


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles" id="roles" class="form-control">
                <option value="General User">General User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form> --}}
    
    {{-- <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;"> --}}

    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div> --}}
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="col">
                                <label for="roles">Roles</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="General User">General User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        {{-- <div class="card-footer justify-content-center">
                            <div class="col-6 justify-content-center">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div> --}}
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
    
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->  
@endsection


