@extends('layouts.app')

@section('content')
    {{-- <h1>Edit User</h1> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                        <h3 class="card-title">Update User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        value="{{ $user->first_name }}">
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="col">
                                    <label for="roles">Roles</label>
                                    <select name="roles" id="roles" class="form-control">
                                        <option value="General User" {{ $user->role == 'General User' ? 'selected' : '' }}>
                                            General User</option>
                                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
@endsection
