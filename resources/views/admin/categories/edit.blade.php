@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Sửa Danh mục</h1>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_name" class="form-label">Tên Danh mục:</label>
                <input type="text" id="category_name" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="parent_category_id" class="form-label">Danh mục Cha:</label>
                <select id="parent_category_id" name="parent_category_id" class="form-select">
                    <option value="">--Chọn Danh mục Cha--</option>
                    @foreach ($categories as $parent)
                        <option value="{{ $parent->id }}" {{ $category->parent_category_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
