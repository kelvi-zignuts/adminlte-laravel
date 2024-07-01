@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles" id="roles" class="form-control">
                <option value="General User" {{ $user->role == 'General User' ? 'selected' : '' }}>General User</option>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
