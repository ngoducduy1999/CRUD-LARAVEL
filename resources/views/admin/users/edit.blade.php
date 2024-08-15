@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ $user->city }}">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="state" class="form-control" value="{{ $user->state }}">
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $user->zip_code }}">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" id="avatar" name="avatar" class="form-control">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="img-thumbnail mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
