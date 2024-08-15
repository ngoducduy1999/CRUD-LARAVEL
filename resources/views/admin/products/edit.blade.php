@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Sửa Sản phẩm</h1>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên Sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Hình ảnh:</label>
                <input type="file" id="product_image" name="product_image" class="form-control">
                @if ($product->product_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" width="100">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
