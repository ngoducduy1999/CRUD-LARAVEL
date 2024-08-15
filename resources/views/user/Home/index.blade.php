<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('slider')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://via.placeholder.com/1500x500" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="https://via.placeholder.com/1500x500" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="https://via.placeholder.com/1500x500" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection

@section('content')
<div class="container">
    <!-- Category Menu -->
    <div class="category-menu mb-5">
        @foreach($categories as $category)
        @if (!is_null($category->parent_category_id) || $category->parent_category_id === "")

        <div class="category-item">
            <img src="https://via.placeholder.com/150x150" alt="{{ $category->category_name }}">
            <p>{{ $category->category_name }}</p>
        </div>
        @endif

        @endforeach
    </div>

    <!-- Products by Category -->
    @foreach($categories as $category)
    <div class="iphone-section mt-5">
        <div class="section-title-container">
            @if (!is_null($category->parent_category_id) || $category->parent_category_id === "")
            <h2 class="section-title">{{ $category->category_name }}</h2>
            @endif
        </div>

        <div class="row">
            <!-- Display Products -->
            @foreach($category->products->take(4) as $product)
            <div class="col-md-3 product-item">
                <div class="new-badge">Mới</div>
                <div class="product-image">
                    <a href="{{ route('user.Home.show', $product->id) }}">
                    @if ($product->product_image)
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
                    @endif
                    </a>
                    <a href="{{ route('user.Home.show', $product->id) }}" class="product-name">{{ $product->name }}</a>
                </div>
                <div class="product-info">
                    @if ($product->productItems->count() > 0)
                        <p class="old-price">{{ number_format($product->productItems->first()->old_price, 0, ',', '.') }} VND</p>
                        <p class="new-price">{{ number_format($product->productItems->first()->price, 0, ',', '.') }} VND</p>
                    @else
                        <p class="old-price">N/A</p>
                        <p class="new-price">N/A</p>
                    @endif
                    <p class="discount">{{ $product->discount }}%</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
