{{-- resources/views/admin/variations/edit.blade.php --}}

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Chỉnh sửa biến thể</h1>
        <form action="{{ route('admin.variations.update', $variation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $variation->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên biến thể</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $variation->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
