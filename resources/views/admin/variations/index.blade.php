{{-- resources/views/admin/variations/index.blade.php --}}

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Danh sách biến thể</h1>
        <a href="{{ route('admin.variations.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($variations as $variation)
                    <tr>
                        <td>{{ $variation->id }}</td>
                        <td>{{ $variation->name }}</td>
                        <td>{{ $variation->category->category_name }}</td>
                        <td>
                            <a href="{{ route('admin.variations.edit', $variation) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.variations.destroy', $variation) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
