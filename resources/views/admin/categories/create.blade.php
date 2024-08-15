@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Tạo Danh mục</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="category_name" class="form-label">Tên Danh mục:</label>
                <input type="text" id="category_name" name="category_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="parent_category_id" class="form-label">Danh mục Cha:</label>
                <select id="parent_category_id" name="parent_category_id" class="form-select">
                    <option value="">--Chọn Danh mục Cha--</option>
                    @foreach ($categories as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
