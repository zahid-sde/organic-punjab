<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     */
    /**
     * Display a listing of all products.
     */
    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $products = $query->paginate(10)->withQueryString();
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $totalStock = Product::sum('stock');
        $categories = Product::categories();
        $selectedCategory = $request->input('category');

        return view('admin.products.index', compact('products', 'totalProducts', 'activeProducts', 'totalStock', 'categories', 'selectedCategory'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Product::categories();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'weight' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image' => 'nullable|string|max:550',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug($validated['name']).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $validated['image'] = 'images/products/'.$filename;
        }

        unset($validated['image_file']);
        $validated['category'] = $validated['category'] ?? 'desi_ghee';
        $validated['slug'] = Str::slug($validated['name']).'-'.Str::random(5);
        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "'.$validated['name'].'" added successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Product::categories();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'weight' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image' => 'nullable|string|max:550',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug($validated['name']).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $validated['image'] = 'images/products/'.$filename;
        }

        unset($validated['image_file']);
        $validated['category'] = $validated['category'] ?? 'desi_ghee';
        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "'.$product->name.'" updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $name = $product->name;
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "'.$name.'" deleted successfully!');
    }
}
