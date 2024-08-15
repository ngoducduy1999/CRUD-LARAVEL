<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Thêm Bootstrap CSS hoặc các thư viện CSS khác ở đây -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Nếu bạn có CSS tùy chỉnh -->
    @yield('styles')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users') }}">Người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories') }}">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.products') }}">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.variations.index') }}">Biến thể</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.variation_options.index') }}">Tùy chọn Biến thể</a>
                        </li>
                    </ul>
                </div>
                <!-- Log Out Button -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Đăng xuất</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Admin Dashboard. All rights reserved.</p>
        </div>
    </footer>

    <!-- Thêm Bootstrap JS và các thư viện JS khác ở đây -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
