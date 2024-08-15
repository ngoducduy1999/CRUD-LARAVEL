@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>User Management</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form tìm kiếm -->
        <form method="GET" action="{{ route('admin.users') }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search by full name">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Nút tạo người dùng mới -->
        <div class="mb-4">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create New User</a>
        </div>

        <!-- Bảng danh sách người dùng -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://via.placeholder.com/50' }}" class="user-avatar" alt="Avatar">
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.toggle', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">
                                    {{ $user->active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        {{ $users->links() }}

       
    </div>
@endsection

@section('styles')
    <style>
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection
