<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the e-commerce store frontpage.
     */
    public function index(): View
    {
        $dbProducts = Product::where('is_active', true)->get();
        $categories = Product::categories();

        $products = $dbProducts->map(function ($product) {
            // Compute discount badge
            $discountStr = null;
            if ($product->original_price && $product->original_price > $product->price) {
                $pct = round((($product->original_price - $product->price) / $product->original_price) * 100);
                $discountStr = $pct.'% OFF';
            }

            // Image handling
            $imgUrl = asset('images/products/ghee-500g.png');
            if ($product->image) {
                $imgUrl = str_starts_with($product->image, 'http') ? $product->image : asset($product->image);
            }

            // Category badge mapping
            $badgeColors = [
                'desi_ghee' => 'warning',
                'green_mirchi' => 'success',
                'haldi' => 'amber',
                'lal_mirch' => 'danger',
                'spices' => 'info',
                'other' => 'dark',
            ];

            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category ?? 'desi_ghee',
                'category_name' => $product->category_name,
                'weight' => $product->weight,
                'price' => (float) $product->price,
                'original_price' => $product->original_price ? (float) $product->original_price : null,
                'discount' => $discountStr ?? 'Best Deal',
                'rating' => 4.9,
                'reviews_count' => 120 + ($product->id * 25),
                'badge' => $product->category_name,
                'badge_color' => $badgeColors[$product->category] ?? 'success',
                'image' => $imgUrl,
                'description' => $product->description ?? 'Pure organic homemade food product.',
            ];
        })->toArray();

        return view('home', compact('products', 'categories'));
    }
}
