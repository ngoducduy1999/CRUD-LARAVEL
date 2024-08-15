<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use App\Models\VariationOption;

class ProductItemController extends Controller
{
    public function index(Product $product)
    {
        $items = $product->productItems()->with('variationOptions')->paginate(10);
        return view('admin.product_items.index', compact('product', 'items'));
    }
    
    public function create(Product $product)
    {
        $variationOptions = VariationOption::all();
        return view('admin.product_items.create', compact('product', 'variationOptions'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'sku' => 'required|string|max:255',
            'qty_in_stock' => 'required|integer',
            'price' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        }

        $productItem = ProductItem::create([
            'product_id' => $product->id,
            'sku' => $request->input('sku'),
            'qty_in_stock' => $request->input('qty_in_stock'),
            'price' => $request->input('price'),
            'product_image' => $imagePath,
        ]);

        if ($request->has('variation_options')) {
            $productItem->variationOptions()->sync($request->input('variation_options'));
        }

        return redirect()->route('admin.product_items.index', $product)->with('success', 'Biến thể được tạo thành công.');
    }

    public function edit(Product $product, ProductItem $productItem)
    {
        $variationOptions = VariationOption::all();
        return view('admin.product_items.edit', compact('product', 'productItem', 'variationOptions'));
    }

    public function update(Request $request, Product $product, ProductItem $productItem)
    {
        $request->validate([
            'sku' => 'required|string|max:255',
            'qty_in_stock' => 'required|integer',
            'price' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $productItem->product_image;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        }

        $productItem->update([
            'sku' => $request->input('sku'),
            'qty_in_stock' => $request->input('qty_in_stock'),
            'price' => $request->input('price'),
            'product_image' => $imagePath,
        ]);

        if ($request->has('variation_options')) {
            $productItem->variationOptions()->sync($request->input('variation_options'));
        }

        return redirect()->route('admin.product_items.index', $product)->with('success', 'Biến thể được cập nhật thành công.');
    }

    public function destroy(Product $product, ProductItem $productItem)
    {
        $productItem->delete();

        return redirect()->route('admin.product_items.index', $product)->with('success', 'Biến thể đã được xóa thành công.');
    }
}
