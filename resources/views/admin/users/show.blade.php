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
