<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductItem;
use App\Models\VariationOption;
use App\Models\Promotion;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        
        $productsByCategory = Category::withCount('products')->get();
        
        $productsByConfiguration = ProductItem::withCount('productConfigurations')->get();
        
        $promotions = Promotion::withCount('categories')->get();

        return view('admin.dashboard', compact('totalProducts', 'productsByCategory', 'productsByConfiguration', 'promotions'));
    }
}
