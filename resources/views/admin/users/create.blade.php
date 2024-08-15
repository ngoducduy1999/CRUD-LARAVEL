@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Create User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="state" class="form-control">
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" id="zip_code" name="zip_code" class="form-control">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" id="avatar" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
