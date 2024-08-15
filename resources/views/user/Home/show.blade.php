@extends('layouts.app')

@section('content')
<div class="product-detail-container">
    <div class="product-detail-images">
        <div class="product-detail-slider">
            <button class="product-detail-nav-button" id="product-detail-prev-btn">&#10094;</button>
            <img id="product-detail-main-image" src="{{ $product->main_image }}" alt="{{ $product->name }}">
            <button class="product-detail-nav-button" id="product-detail-next-btn">&#10095;</button>
        </div>
        <div class="product-detail-thumbnail-gallery">
            @foreach($product->images as $image)
                <img class="product-detail-thumbnail" src="{{ $image->url }}" alt="Thumbnail" data-image="{{ $image->url }}">
            @endforeach
        </div>
    </div>
    <div class="product-detail-info">
        <div class="product-detail-promotions">
            <p><strong>Giá và khuyến mãi tại: Hà Nội</strong></p>
        </div>
        <h1 class="product-detail-title">{{ $product->name }}</h1>
        <p class="product-detail-price">${{ $product->price }}</p>
        <p class="product-detail-points">+27,990 điểm tích lũy Quà Tặng VIP</p>
        <p class="product-detail-ram">RAM {{ $product->ram }} - SSD {{ $product->ssd }}</p>
        <div class="product-detail-gb-options">
            @foreach($product->storage_options as $option)
                <span class="product-detail-gb-option">{{ $option }}</span>
            @endforeach
        </div>
        <div class="product-detail-color-options">
            <p class="product-detail-color">Màu: {{ $product->color }}</p>
            @foreach($product->color_options as $color)
                <span class="product-detail-color-option" style="background-color: {{ $color }};"></span>
            @endforeach
        </div>
        <button class="product-detail-buy-button">Mua Ngay</button>
    </div>
</div>

<div class="product-detail-description-container">
    <div class="product-detail-description-summary">
        <p class="product-detail-description">{{ Str::limit($product->description, 100) }}</p>
        <button id="show-more-btn">Xem thêm</button>
    </div>
    <div class="product-detail-full-description">
        <p>{{ $product->description }}</p>
        <button id="show-less-btn">Thu gọn</button>
    </div>
</div>

<h4>Đánh giá</h4>
@foreach($product->reviews as $review)
<div class="border p-3 mb-2">
    <div class="star-rating-display">
        @for ($i = 1; $i <= 5; $i++)
            <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
        @endfor
    </div>
    <p>{{ $review->comment }}</p>
</div>
@endforeach

<div class="product-detail-reviews">
    <h2>Đánh giá sản phẩm này</h2>
    <p>Nếu đã mua sản phẩm này tại TopZone, hãy đánh giá ngay để giúp hàng ngàn người chọn mua hàng tốt nhất bạn nhé!</p>
    <div class="review-stars">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
</div>

<!-- Modal Container -->
<div class="modal-overlay" id="modal-overlay"></div>

<div class="review-form-modal" id="review-form-modal">
    <h3>Đánh giá sản phẩm</h3>
    <form action="{{ route('product.storeReview', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p><strong>{{ $product->name }}</strong></p>
        <label for="rating">Chọn mức đánh giá:</label>
        <select id="rating" name="rating">
            <option value="1">Rất tệ</option>
            <option value="2">Tệ</option>
            <option value="3">Tạm ổn</option>
            <option value="4">Tốt</option>
            <option value="5">Rất tốt</option>
        </select>
        <label for="comment">Mời bạn chia sẻ thêm cảm nhận...</label>
        <textarea id="comment" name="comment" rows="4"></textarea>
        <label for="photos">Gửi ảnh thực tế (tối đa 3 ảnh):</label>
        <input type="file" id="photos" name="photos[]" accept="image/*" multiple>
        <label>
            <input type="checkbox" name="recommend"> Tôi sẽ giới thiệu sản phẩm cho bạn bè, người thân
        </label>
        <label for="name">Họ tên (bắt buộc):</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Số điện thoại (bắt buộc):</label>
        <input type="text" id="phone" name="phone" required>
        <label>
            <input type="checkbox" name="privacy" required> Tôi đồng ý với Chính sách xử lý dữ liệu cá nhân của TopZone
        </label>
        <button type="submit">Gửi đánh giá</button>
    </form>
    <button class="modal-close" id="modal-close">Đóng</button>
</div>

<style>
    /* Include your styles here */
</style>

<script>
    // Include your JavaScript here
</script>
@endsection
