@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Thêm CSS tùy chỉnh cho dashboard nếu cần -->
@endsection

@section('content')
    <h1>Dashboard</h1>

    <!-- Tổng số sản phẩm -->
    <div class="mb-4">
        <h2>Tổng số sản phẩm: {{ $totalProducts }}</h2>
    </div>

    <!-- Tổng số sản phẩm theo từng danh mục -->
    <div class="mb-4">
        <h2>Số sản phẩm theo từng danh mục</h2>
        <ul class="list-group">
            @foreach($productsByCategory as $category)
                <li class="list-group-item">{{ $category->category_name }}: {{ $category->products_count }} sản phẩm</li>
            @endforeach
        </ul>
    </div>

    <!-- Tổng số sản phẩm theo từng cấu hình -->
    <div class="mb-4">
        <h2>Số sản phẩm theo từng cấu hình</h2>
        <ul class="list-group">
            @foreach($productsByConfiguration as $productItem)
                <li class="list-group-item">{{ $productItem->name }}: {{ $productItem->product_configurations_count }} cấu hình</li>
            @endforeach
        </ul>
    </div>

    <!-- Tổng số sản phẩm theo từng khuyến mãi -->
    <div class="mb-4">
        <h2>Số sản phẩm theo từng khuyến mãi</h2>
        <ul class="list-group">
            @foreach($promotions as $promotion)
                <li class="list-group-item">{{ $promotion->name }}: {{ $promotion->categories_count }} danh mục</li>
            @endforeach
        </ul>
    </div>
@endsection

@section('scripts')
    <!-- Thêm JavaScript tùy chỉnh cho dashboard nếu cần -->
@endsection
