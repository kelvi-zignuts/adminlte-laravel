@extends('layouts.app')

@section('content')
    {{-- <h1>Users</h1> --}}
    <div class="d-flex justify-content-end ">
        {{-- <a href="{{ route('users.create') }}" class="btn btn-primary m-3">+ Add New User</a> --}}
        <div class="d-flex justify-content-end ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#createUserModal">
                + Add New User
            </button>
        </div>
    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container d-flex justify-content-center">
        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="start_date">From Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>
                <div class="col-auto">
                    <label for="end_date">To Date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>
                <div class="col-auto">
                    <label for="role">Filter by Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">All</option>
                        <option value="Admin">Admin</option>
                        <option value="General User">General User</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="status">Filter by Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All</option>
                        <option value="approved">Approved</option>
                        <option value="reconciled">Reconciled</option>
                        <option value="declined">Declined</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4">Apply Filter</button>
                </div>
            </div>
        </form>
    </div>


    {{-- <table class="table">
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
                                    <a href="#" class="nav-link" onclick="confirmDelete('{{ route('users.destroy', $user) }}'); event.preventDefault();">Delete</a>
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
    </table> --}}
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>More</th>
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
                                    <ion-icon style="font-size: 25px" class="dropdown-toggle"
                                        name="ellipsis-vertical-circle-outline" role="button" id="actionsDropdown"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></ion-icon>
                                    <div class="dropdown-menu" aria-labelledby="actionsDropdown">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal{{ $user->id }}">Edit</a>

                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="dropdown-item"
                                                onclick="confirmDelete('{{ route('users.destroy', $user) }}'); event.preventDefault();">Delete</a>
                                        </form>
                                    </div>

                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModal{{ $user->id }}Label" aria-hidden="true">
                               <div class="modal-dialog modal-lg" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title" id="editModal{{ $user->id }}Label">Edit User</h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <!-- Edit Form -->
                                           <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
   
                                               <div class="form-group">
                                                   <label for="first_name">First Name</label>
                                                   <input type="text" name="first_name" id="first_name"
                                                          class="form-control"
                                                          value="{{ old('first_name', $user->first_name) }}">
                                               </div>
   
                                               <div class="form-group">
                                                   <label for="last_name">Last Name</label>
                                                   <input type="text" name="last_name" id="last_name"
                                                          class="form-control"
                                                          value="{{ old('last_name', $user->last_name) }}">
                                               </div>
   
                                               <div class="form-group">
                                                   <label for="phone">Phone</label>
                                                   <input type="text" name="phone" id="phone" class="form-control"
                                                          value="{{ old('phone', $user->phone) }}">
                                               </div>
   
                                               <div class="form-group">
                                                   <label for="roles">Roles</label>
                                                   <select name="roles" id="roles" class="form-control">
                                                       <option value="General User"
                                                               {{ $user->roles === 'General User' ? 'selected' : '' }}>
                                                           General User
                                                       </option>
                                                       <option value="Admin"
                                                               {{ $user->roles === 'Admin' ? 'selected' : '' }}>
                                                           Admin
                                                       </option>
                                                   </select>
                                               </div>
   
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">Close
                                                   </button>
                                                   <button type="submit" class="btn btn-primary">Save Changes</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center w-100" id="createUserModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your form content -->
                    <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            value="{{ old('first_name') }}">
                                    </div>
                                    <div class="col">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            value="{{ old('last_name') }}">
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
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
