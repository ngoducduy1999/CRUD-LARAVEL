<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductItemController; // Thêm controller cho ProductItem
use App\Http\Controllers\ProductConfigurationController; // Thêm controller cho ProductConfiguration
use App\Http\Controllers\VariationOptionController; // Thêm controller cho VariationOption

// Routes cho Auth
Route::get('/', [HomeController::class, 'index'])->name('user.Home.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('user.Home.show');
Route::get('/products', [HomeController::class, 'list'])->name('products.list');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category.show');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Routes cho người dùng đã đăng nhập
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'update'])->name('user.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // Routes cho quản lý người dùng
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/index', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users/{user}/toggle', [AdminController::class, 'toggle'])->name('admin.toggle');

    // Routes cho quản lý danh mục
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Routes cho quản lý sản phẩm
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Routes cho quản lý biến thể sản phẩm
    Route::get('/admin/product_items/{product}', [ProductItemController::class, 'index'])->name('admin.product_items.index');
    Route::get('/admin/product_items/{product}/create', [ProductItemController::class, 'create'])->name('admin.product_items.create');
    Route::post('/admin/product_items/{product}', [ProductItemController::class, 'store'])->name('admin.product_items.store');
    Route::get('/admin/product_items/{product}/{productItem}/edit', [ProductItemController::class, 'edit'])->name('admin.product_items.edit');
    Route::put('/admin/product_items/{product}/{productItem}', [ProductItemController::class, 'update'])->name('admin.product_items.update');
    Route::delete('/admin/product_items/{product}/{productItem}', [ProductItemController::class, 'destroy'])->name('admin.product_items.destroy');

    // Routes cho quản lý cấu hình sản phẩm
    Route::get('/admin/product_configurations', [ProductConfigurationController::class, 'index'])->name('admin.product_configurations.index');
    Route::get('/admin/product_configurations/create', [ProductConfigurationController::class, 'create'])->name('admin.product_configurations.create');
    Route::post('/admin/product_configurations', [ProductConfigurationController::class, 'store'])->name('admin.product_configurations.store');
    Route::get('/admin/product_configurations/{productConfiguration}/edit', [ProductConfigurationController::class, 'edit'])->name('admin.product_configurations.edit');
    Route::put('/admin/product_configurations/{productConfiguration}', [ProductConfigurationController::class, 'update'])->name('admin.product_configurations.update');
    Route::delete('/admin/product_configurations/{productConfiguration}', [ProductConfigurationController::class, 'destroy'])->name('admin.product_configurations.destroy');

    // Routes cho quản lý biến thể
    Route::get('/admin/variations', [VariationController::class, 'index'])->name('admin.variations.index');
    Route::get('/admin/variations/create', [VariationController::class, 'create'])->name('admin.variations.create');
    Route::post('/admin/variations', [VariationController::class, 'store'])->name('admin.variations.store');
    Route::get('/admin/variations/{variation}/edit', [VariationController::class, 'edit'])->name('admin.variations.edit');
    Route::put('/admin/variations/{variation}', [VariationController::class, 'update'])->name('admin.variations.update');
    Route::delete('/admin/variations/{variation}', [VariationController::class, 'destroy'])->name('admin.variations.destroy');

    // Routes cho quản lý tùy chọn biến thể
    Route::get('/admin/variation_options', [VariationOptionController::class, 'index'])->name('admin.variation_options.index');
    Route::get('/admin/variation_options/create', [VariationOptionController::class, 'create'])->name('admin.variation_options.create');
    Route::post('/admin/variation_options', [VariationOptionController::class, 'store'])->name('admin.variation_options.store');
    Route::get('/admin/variation_options/{variationOption}/edit', [VariationOptionController::class, 'edit'])->name('admin.variation_options.edit');
    Route::put('/admin/variation_options/{variationOption}', [VariationOptionController::class, 'update'])->name('admin.variation_options.update');
    Route::delete('/admin/variation_options/{variationOption}', [VariationOptionController::class, 'destroy'])->name('admin.variation_options.destroy');
});
