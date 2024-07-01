@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('users.index') }}" method="GET" class="mb-3">
        <div class="form-group col-2 justify-content-center">
            <label for="role">Filter by Role:</label>
            <select name="role" id="role" class="form-control">
                <option value="">All</option>
                <option value="Admin">Admin</option>
                <option value="General User">General User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply Filter</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->roles }}</td>
                    {{-- <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-info">View</a>
                    </td> --}}
                    <td>
                        <div class="btn-group">
                            <ion-icon name="list-circle-outline" class="dropdown-toggle" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false"></ion-icon>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('users.edit', $user) }}">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                                {{-- <a class="dropdown-item" href="{{ route('users.show', $user) }}">View</a> --}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection