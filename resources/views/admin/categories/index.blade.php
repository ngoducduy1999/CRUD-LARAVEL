@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Danh sách Danh mục</h1>
        
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.categories') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        
        <!-- Nút tạo danh mục -->
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Tạo Danh mục</a>
        
        <!-- Bảng danh mục -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh mục</th>
                        <th>Danh mục Cha</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->parentCategory->category_name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Phân trang -->
        {{ $categories->links() }}
    </div>
@endsection
