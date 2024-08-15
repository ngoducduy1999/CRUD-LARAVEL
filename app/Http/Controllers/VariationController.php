<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Models\Category;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function index()
    {
        $variations = Variation::with('category')->get();
        return view('admin.variations.index', compact('variations'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.variations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        Variation::create($request->all());
        return redirect()->route('admin.variations.index')->with('success', 'Variation created successfully.');
    }

    public function edit(Variation $variation)
    {
        $categories = Category::all();
        return view('admin.variations.edit', compact('variation', 'categories'));
    }

    public function update(Request $request, Variation $variation)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $variation->update($request->all());
        return redirect()->route('admin.variations.index')->with('success', 'Variation updated successfully.');
    }

    public function destroy(Variation $variation)
    {
        $variation->delete();
        return redirect()->route('admin.variations.index')->with('success', 'Variation deleted successfully.');
    }
}
