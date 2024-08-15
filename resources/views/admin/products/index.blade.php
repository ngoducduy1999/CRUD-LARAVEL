@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Danh sách Sản phẩm</h1>
        <form action="{{ route('admin.products') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Tạo Sản phẩm</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Biến thể</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                            <td>
                                @if ($product->product_image)
                                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.product_items.index', $product) }}" class="btn btn-info btn-sm">Quản lý Biến thể</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
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
        {{ $products->links() }}
    </div>
@endsection
