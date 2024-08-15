<?php

namespace App\Http\Controllers;

use App\Models\ProductConfiguration;
use App\Models\ProductItem;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class ProductConfigurationController extends Controller
{
    public function index()
    {
        $productConfigurations = ProductConfiguration::with(['productItem', 'variationOption'])->get();
        return view('admin.product_configurations.index', compact('productConfigurations'));
    }
    
    public function create()
    {
        $productItems = ProductItem::all();
        $variationOptions = VariationOption::all();
        return view('admin.product_configurations.create', compact('productItems', 'variationOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_item_id' => 'required|exists:product_items,id',
            'variation_option_id' => 'required|exists:variation_options,id',
        ]);

        ProductConfiguration::create($request->all());

        return redirect()->route('admin.product_configurations.index')->with('success', 'Product Configuration created successfully.');
    }

    public function edit(ProductConfiguration $productConfiguration)
    {
        $productItems = ProductItem::all();
        $variationOptions = VariationOption::all();
        return view('admin.product_configurations.edit', compact('productConfiguration', 'productItems', 'variationOptions'));
    }

    public function update(Request $request, ProductConfiguration $productConfiguration)
    {
        $request->validate([
            'product_item_id' => 'required|exists:product_items,id',
            'variation_option_id' => 'required|exists:variation_options,id',
        ]);

        $productConfiguration->update($request->all());

        return redirect()->route('admin.product_configurations.index')->with('success', 'Product Configuration updated successfully.');
    }

    public function destroy(ProductConfiguration $productConfiguration)
    {
        $productConfiguration->delete();

        return redirect()->route('admin.product_configurations.index')->with('success', 'Product Configuration deleted successfully.');
    }
}
