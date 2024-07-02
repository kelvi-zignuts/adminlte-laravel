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
        <div class="form-row align-items-center">
            <div class="form-group col">
                <label for="start_date">From Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="form-group col">
                <label for="end_date">To Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <div class="form-group col">
                <label for="role">Filter by Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="">All</option>
                    <option value="Admin">Admin</option>
                    <option value="General User">General User</option>
                </select>
            </div>

            <div class="form-group col">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="">All</option>
                    <option value="approved">Approved</option>
                    <option value="reconciled">Reconciled</option>
                    <option value="declined">Declined</option>
                </select>
            </div>
            <div class="form-group col">
                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Status</th>
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
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->roles }}</td>
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
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($users->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">No users found.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
