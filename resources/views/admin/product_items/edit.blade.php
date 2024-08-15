@extends('layouts.admin')

@section('content')

    <h1>Sửa Biến thể của sản phẩm: {{ $product->name }}</h1>

    <form action="{{ route('admin.product_items.update', [$product, $productItem]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', $productItem->sku) }}" required>
        </div>

        <div class="form-group">
            <label for="qty_in_stock">Số lượng trong kho</label>
            <input type="number" id="qty_in_stock" name="qty_in_stock" class="form-control" value="{{ old('qty_in_stock', $productItem->qty_in_stock) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $productItem->price) }}" required>
        </div>

        <div class="form-group">
            <label for="product_image">Hình ảnh</label>
            <input type="file" id="product_image" name="product_image" class="form-control">
            @if ($productItem->product_image)
                <img src="{{ asset('storage/' . $productItem->product_image) }}" alt="{{ $productItem->sku }}" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="variation_options">Tùy chọn biến thể</label>
            <select name="variation_options[]" id="variation_options" class="form-control" multiple>
                @foreach($variationOptions as $option)
                    <option value="{{ $option->id }}" {{ in_array($option->id, $productItem->variationOptions->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $option->value }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>

@endsection
