
<!DOCTYPE html>
<html>
<head>
    <title>TopZone Clone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .d-none {
    display: none;
}

        .navbar {
            background-color: #000000;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        
        .nav-item-center {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        .nav-item {
            margin: 0 20px; /* Increase spacing between menu items */
        }
        .icon-btn {
            background-color: #323131;
            color: #ffffff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .carousel-indicators [data-bs-target] {
            background-color: #ffffff;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%;
            transform: translateY(-50%);
        }
        .carousel-control-prev {
            left: 10px;
        }
        .carousel-control-next {
            right: 10px;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-size: 100%, 100%;
        }
        .category-menu {
            margin: 50px auto 80px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .category-item {
            width: 15%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none; /* Remove underline from link */
            color: #000; /* Default text color */
        }
        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .category-item img {
            width: 100%;
            height: 150px; /* Adjust the height as needed */
            object-fit: cover;
        }
        .category-item p {
            margin: 10px 0;
            font-weight: bold;
        }
        .footer {
            background-color: #000000;
            color: #ffffff;
            padding: 40px 0;
            position: relative;
            bottom: 0;
        }
        .container {
            width: 100%;
            max-width: 1200px; /* Điều chỉnh giá trị theo ý muốn */
            padding: 0 15px;
            margin: 0 auto;
        }
        .footer-logo {
            margin-bottom: 20px;
        }
        .footer-logo img {
            max-width: 150px;
        }
        .footer-section {
            margin-bottom: 30px;
        }
        .footer-section h5 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #ffffff;
        }
        .footer-section a {
            color: #ffffff;
            text-decoration: none;
        }
        .footer-section a:hover {
            text-decoration: underline;
        }
        .footer-social-icons a {
            color: #ffffff;
            margin: 0 10px;
            font-size: 24px;
        }
        .footer-social-icons a:hover {
            color: #cccccc;
        }
        .footer-bottom {
            border-top: 1px solid #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        .iphone-section {
            margin-top: 40px;
        }
        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .iphone-section {
            text-align: center; /* Căn giữa tiêu đề */
            margin: 0 auto;
        }
        .section-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Khoảng cách giữa icon và tiêu đề */
        }
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin: 0;
        }
        .product-item {
            margin-top: 80px;
            border-radius: 24px;
            border: 1px solid #e0e0e0;
            overflow: hidden;
            margin-bottom: 20px;
            background-color: #ffffff;
            transition: box-shadow 0.3s;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Khoảng cách giữa các item */
        }
        .row_ {
            display: flex;
            flex-wrap: wrap;
        }
        .product-item {
            position: relative;
            flex: 1 1 calc(25% - 20px); /* 25% chiều rộng của cột, trừ khoảng cách */
            box-sizing: border-box; /* Đảm bảo padding và border không ảnh hưởng đến kích thước tổng thể */
            margin-bottom: 20px; /* Khoảng cách giữa các hàng sản phẩm */
            height: 460px;
        }
        .product-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .product-image {
            padding-top: 50px;
        }
        .product-image img {
            width: 250px;
            height: 250px;
        }
        .new-badge {
            margin-top: 10px;
            width: 50px;
            position: absolute;
            background-color: #ff0000;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }
        .product-info {
            
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            text-align: center;
        }
        .product-image .product-name {
            padding-top: 20px;
            display: block;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #000;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .product-info .product-name:hover {
            text-decoration: underline;
        }
        .product-info .old-price {
            text-decoration: line-through;
            color: #888888;
        }
        .product-info .new-price {
            font-size: 20px;
            font-weight: bold;
            color: #ff0000;
        }
        .product-info .discount {
            font-size: 14px;
            color: #ff0000;
        }
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; /* Ensure the navbar stays above other content */
        }
        .grid{
  
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 cột */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    }
.product-item-list{
    width: 100%;
           
            border-radius: 24px;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            background-color: #ffffff;
}
.capacity-info{
    padding-top: 10px;
    
}
.product-item-list .capacity-info {

    display: flex;
    justify-content: center;
    gap: 10px; /* Khoảng cách giữa các ô */
    margin-top: 10px;
}  
.capacity-info .capacity-item {
    background-color: #f0f0f0;
    border-radius: 8px;
    padding: 5px 10px;
    border: 1px solid #ddd;
    font-size: 14px;
    color: #333;
}
/* Định dạng thanh menu phụ */
.product-filter {
    margin-top: 80px;
    margin-bottom: 20px;
}

.filter-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: left;
    border-bottom: 2px solid #e0e0e0;
}

.filter-menu .filter-item {
    margin: 0 15px;
    font-size: 16px;
    text-decoration: none;
    color: #000;
    padding: 10px 0;
    position: relative;
    transition: color 0.3s, text-decoration 0.3s;
}

.filter-menu .filter-item.active {
    font-weight: bold;
    text-decoration: underline; /* Hiệu ứng gạch chân khi hover */
    
}

.filter-menu .filter-item:hover {
    
    text-decoration: underline; /* Hiệu ứng gạch chân khi hover */
}
/* Dropdown menu */
/* Dropdown menu */
.dropdown {
    position: relative;
    display: grid;
    justify-content: right;
}

.dropbtn {
    background-color: #f5f5f5;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    color: #000;
    transition: background-color 0.3s, color 0.3s;
    position: relative; /* Đảm bảo mũi tên nằm đúng vị trí */
    display: flex;
    align-items: center;
}

.dropbtn:hover {
    background-color: #e0e0e0;
    color: #ff0000;
}

.arrow {
    display: inline-block;
    width: 10px;
    height: 10px;
    border: solid #000;
    border-width: 0 2px 2px 0;
    content: "";
    transform: rotate(45deg);
    transition: transform 0.3s;
    margin-left: 10px;
}

.arrow.up {
    transform: rotate(-135deg);
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    z-index: 1000;
}

.dropdown-content a {
    color: #000;
    padding: 10px 20px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s, color 0.3s;
}

.dropdown-content a:hover {
    background-color: #f5f5f5;
    color: #ff0000;
}
.star-rating-display {
    display: flex;
    gap: 5px;
}

.star-rating-display .star {
    font-size: 20px;
    color: #ddd;
}

.star-rating-display .star.filled {
    color: #ffcc00;
}
.form-label {
    font-weight: bold;
    margin-bottom: 5px;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">TopZone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto nav-item-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @foreach($categories as $category)
                    @if (!is_null($category->parent_category_id) || $category->parent_category_id === "")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.show', $category->id) }}">{{ $category->category_name }}</a>
                    </li>
                    @endif

                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>    
                  
                </ul>
                <div class="d-flex">
                    <button class="icon-btn me-2">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="icon-btn me-2">
                        <i class="bi bi-cart"></i>
                    </button>
                
                    @if (Auth::check())
                        <!-- Dropdown quản lý user -->
                        <div class="dropdown">
                            <button class="icon-btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Quản lý tài khoản</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <!-- Icon đăng nhập -->
                        <button class="icon-btn">
                            <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i></a>
                        </button>
                    @endif
                </div>
                
            </div>
        </div>
    </nav>
    @yield('slider')

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
        
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row_">
                <!-- Logo Section -->
                <div class="col-md-3 footer-section footer-logo">
                    <img src="https://via.placeholder.com/150" alt="TopZone Logo">
                </div>
                <!-- Quick Links -->
                <div class="col-md-3 footer-section">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="/list">Products</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <!-- Contact Info -->
                <div class="col-md-3 footer-section">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Email: support@topzone.com</li>
                        <li>Phone: +123 456 789</li>
                        <li>Address: 123 TopZone St, City, Country</li>
                    </ul>
                </div>
                <!-- Social Media -->
                <div class="col-md-3 footer-section footer-social-icons">
                    <h5>Follow Us</h5>
                    <a href="#" class="bi bi-facebook"></a>
                    <a href="#" class="bi bi-twitter"></a>
                    <a href="#" class="bi bi-instagram"></a>
                    <a href="#" class="bi bi-youtube"></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2024 TopZone Clone. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       
        window.onscroll = function() {myFunction()};

        // Get the navbar
        var navbar = document.querySelector('.navbar');

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= 300) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        } 
        document.addEventListener('DOMContentLoaded', function() {
    const dropbtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-content');
    const arrow = document.querySelector('.arrow');
    
    dropbtn.addEventListener('click', function() {
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
            arrow.classList.remove('up');
        } else {
            dropdownContent.style.display = 'block';
            arrow.classList.add('up');
        }
    });
    
    // Đóng dropdown khi click ra ngoài
    window.addEventListener('click', function(event) {
        if (!dropbtn.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.style.display = 'none';
            arrow.classList.remove('up');
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const filterToggle = document.getElementById('filter-toggle');
    const filterForm = document.getElementById('filter-form');

    filterToggle.addEventListener('click', function () {
        filterForm.classList.toggle('d-none');
    });
});

    </script>
    
</body>
</html>
