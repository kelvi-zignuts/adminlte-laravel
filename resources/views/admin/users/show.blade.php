@extends('layouts.app')

@section('content')
    <h1>View User</h1>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" class="form-control" value="{{ $user->first_name }}" readonly>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" class="form-control" value="{{ $user->last_name }}" readonly>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" id="phone" class="form-control" value="{{ $user->phone }}" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
@endsection


    {{-- <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Include your form here -->
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value="{{ old('last_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="General User">General User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}