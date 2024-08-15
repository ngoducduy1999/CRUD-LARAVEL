<?php

namespace App\Http\Controllers;

use App\Models\VariationOption;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationOptionController extends Controller
{
    public function index()
    {
        $variationOptions = VariationOption::with('variation')->get();
        return view('admin.variation_options.index', compact('variationOptions'));
    }

    public function create()
    {
        $variations = Variation::all();
        return view('admin.variation_options.create', compact('variations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'variation_id' => 'required|exists:variations,id',
            'value' => 'required|string|max:255',
        ]);

        VariationOption::create($request->all());
        return redirect()->route('admin.variation_options.index')->with('success', 'Variation option created successfully.');
    }

    public function edit(VariationOption $variationOption)
    {
        $variations = Variation::all();
        return view('admin.variation_options.edit', compact('variationOption', 'variations'));
    }

    public function update(Request $request, VariationOption $variationOption)
    {
        $request->validate([
            'variation_id' => 'required|exists:variations,id',
            'value' => 'required|string|max:255',
        ]);

        $variationOption->update($request->all());
        return redirect()->route('admin.variation_options.index')->with('success', 'Variation option updated successfully.');
    }

    public function destroy(VariationOption $variationOption)
    {
        $variationOption->delete();
        return redirect()->route('admin.variation_options.index')->with('success', 'Variation option deleted successfully.');
    }
}
