<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $variations = Variation::with('variationOptions')->get();
        return view('user.Home.index', compact('categories', 'variations'));
    }

    public function list(Request $request)
    {
        $categories = Category::with('products')->get();
        $query = Product::query();
    
        // Tìm kiếm theo tên sản phẩm
        if ($request->has('name') && $request->input('name') !== '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        // Tìm kiếm theo tên biến thể
        if ($request->has('variation') && $request->input('variation') !== '') {
            $query->whereHas('productItems.variationOptions.variation', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('variation') . '%');
            });
        }
    
        // Tìm kiếm theo tùy chọn biến thể
        if ($request->has('variation_option') && $request->input('variation_option') !== '') {
            $query->whereHas('productItems.variationOptions', function ($query) use ($request) {
                $query->where('value', $request->input('variation_option'));
            });
        }
    
        // Sắp xếp sản phẩm
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                case 'newest':
                    $query->latest();
                    break;
                case 'best_selling':
                    // Thay đổi theo cách sắp xếp bán chạy của bạn
                    break;
                case 'price_low_high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high_low':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }
    
        $products = $query->paginate(10);
        $variations = Variation::with('variationOptions')->get();
        return view('user.Home.list', compact('products', 'categories', 'variations'));
    }
    

}
