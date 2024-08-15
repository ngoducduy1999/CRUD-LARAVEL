<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('category_name', 'LIKE', "%{$search}%");
        }

        $categories = $query->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả danh mục
        return view('admin.categories.create', compact('categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_category_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'category_name' => $request->input('category_name'),
            'parent_category_id' => $request->input('parent_category_id')
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        // Fetch all categories for the dropdown in the edit view
        $categories = Category::whereNull('parent_category_id')->get();
    
        return view('admin.categories.edit', compact('category', 'categories'));
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_category_id' => 'nullable|exists:categories,id'
        ]);

        $category->update([
            'category_name' => $request->input('category_name'),
            'parent_category_id' => $request->input('parent_category_id')
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
