@extends('layouts.app')

@section('content')
<div class="iphone-section mt-5">
    <div class="section-title-container">
        <!-- Title -->
        <h2 class="section-title">{{ $categoryName ?? 'Danh sách sản phẩm' }}</h2>
    </div>

    <div class="product-filter">
        <!-- Filter menu -->
        <ul class="filter-menu">
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'all'])) }}" class="filter-item {{ request('sort') == 'all' ? 'active' : '' }}">Tất cả</a></li>
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'iphone_15'])) }}" class="filter-item {{ request('sort') == 'iphone_15' ? 'active' : '' }}">iPhone 15</a></li>
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'iphone_14'])) }}" class="filter-item {{ request('sort') == 'iphone_14' ? 'active' : '' }}">iPhone 14</a></li>
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'iphone_13'])) }}" class="filter-item {{ request('sort') == 'iphone_13' ? 'active' : '' }}">iPhone 13</a></li>
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'iphone_12'])) }}" class="filter-item {{ request('sort') == 'iphone_12' ? 'active' : '' }}">iPhone 12</a></li>
            <li><a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'iphone_11'])) }}" class="filter-item {{ request('sort') == 'iphone_11' ? 'active' : '' }}">iPhone 11</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <button class="dropbtn">
            Sort by
            <span class="arrow"></span>
        </button>
        <div class="dropdown-content">
            <a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'newest'])) }}" data-sort="newest">Mới nhất</a>
            <a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'best_selling'])) }}" data-sort="popular">Bán chạy</a>
            <a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'price_low_high'])) }}" data-sort="price-asc">Giá: Thấp đến Cao</a>
            <a href="{{ route('products.list', array_merge(request()->query(), ['sort' => 'price_high_low'])) }}" data-sort="price-desc">Giá: Cao đến Thấp</a>
        </div>
    </div>

    <button id="filter-toggle" class="btn btn-secondary mb-3">
        <i class="fas fa-filter"></i> Lọc
    </button>

    <form id="filter-form" method="GET" action="{{ route('products.list') }}" class="mb-3">
        <div class="form-row align-items-end">
            <div class="col-md-4 mb-3">
                <label for="productName" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="productName" placeholder="Tên sản phẩm" value="{{ request('name') }}">
            </div>
            {{-- <div class="col-md-4 mb-3">
                <label for="variationName" class="form-label">Tên biến thể</label>
                <input type="text" name="variation" class="form-control" id="variationName" placeholder="Tên biến thể" value="{{ request('variation') }}">
            </div> --}}
            <div class="col-md-4 mb-3">
                <label for="variationOption" class="form-label">Tùy chọn biến thể</label>
                <select name="variation_option" class="form-control" id="variationOption">
                    <option value="">Chọn tùy chọn</option>
                    @foreach($variations as $variation)
                        @foreach($variation->variationOptions as $option)
                            <option value="{{ $option->value }}" {{ request('variation_option') == $option->value ? 'selected' : '' }}>
                                {{ $variation->name }} - {{ $option->value }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>
    </form>
    

    <div class="grid">
        <!-- Display products -->
        @foreach($products as $product)
        @php
            $firstItem = $product->productItems->first();
            $price = $firstItem ? number_format($firstItem->price, 0, ',', '.') . ' VND' : 'Liên hệ';
        @endphp
        <div class="col-md-3 product-item-list">
            <div class="new-badge">Mới</div>
            <div class="product-image">
                <a href="{{ route('user.Home.show', $product->id) }}">
                    @if ($product->product_image)
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
                    @endif
                </a>
                <div class="capacity-info">
                    @foreach($product->productItems as $item)
                    @foreach($item->variationOptions as $option)
                    <div class="capacity-item">{{ $option->value }}</div>
                    @endforeach
                    @endforeach
                </div>
                <a href="{{ route('user.Home.show', $product->id) }}" class="product-name">{{ $product->name }}</a>
            </div>
            <div class="product-info">
                <p class="new-price">{{ $price }}</p>
                <p class="discount">{{ $product->discount }}%</p>
            </div>
        </div>
        @endforeach
    </div>

    {{ $products->links('pagination::bootstrap-4') }}
</div>
@endsection
