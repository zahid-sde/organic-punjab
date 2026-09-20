<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@desighee.com'],
            [
                'name' => 'Store Admin',
                'phone' => '+91 8837882648',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Seed Default Customer User
        User::updateOrCreate(
            ['email' => 'customer@desighee.com'],
            [
                'name' => 'Desi Customer',
                'phone' => '+91 9123456789',
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'email_verified_at' => now(),
            ]
        );

        // Seed Organic Products Catalog
        $products = [
            // --- DESI GHEE ---
            [
                'name' => 'Pure Organic A2 Desi Cow Ghee - 250g Glass Jar',
                'slug' => 'pure-organic-a2-desi-cow-ghee-250g',
                'category' => 'desi_ghee',
                'weight' => '250g Jar',
                'price' => 499.00,
                'original_price' => 599.00,
                'stock' => 50,
                'image' => 'images/products/ghee-250g.png',
                'description' => 'Compact 250g trial glass jar of 100% pure organic A2 Desi Cow Ghee churned traditionally using Vedic wooden Bilona method.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Organic A2 Desi Cow Ghee - 500g Glass Jar',
                'slug' => 'pure-organic-a2-desi-cow-ghee-500g',
                'category' => 'desi_ghee',
                'weight' => '500g Jar',
                'price' => 899.00,
                'original_price' => 1099.00,
                'stock' => 100,
                'image' => 'images/products/ghee-500g.png',
                'description' => 'Best-selling 500g glass jar. Aromatic, granular, and rich in natural A2 nutrients and healthy fats.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Organic A2 Desi Cow Ghee - 1 kg Family Jar',
                'slug' => 'pure-organic-a2-desi-cow-ghee-1kg',
                'category' => 'desi_ghee',
                'weight' => '1 kg Family Pack',
                'price' => 1699.00,
                'original_price' => 1999.00,
                'stock' => 75,
                'image' => 'images/products/ghee-1kg.png',
                'description' => 'Value 1 kg family pack. Handcrafted from indigenous Gir cow milk following authentic Ayurvedic traditions.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Organic A2 Desi Cow Ghee - 5 kg Bulk Steel Dolchi',
                'slug' => 'pure-organic-a2-desi-cow-ghee-5kg',
                'category' => 'desi_ghee',
                'weight' => '5 kg Steel Dolchi',
                'price' => 7999.00,
                'original_price' => 9499.00,
                'stock' => 20,
                'image' => 'images/products/ghee-5kg.png',
                'description' => 'Traditional 5 kg stainless steel Dolchi container for bulk household purity and long-lasting storage.',
                'is_active' => true,
            ],

            // --- GREEN MIRCHI POWDER ---
            [
                'name' => 'Homemade Organic Green Mirchi Powder (Hari Mirch) - 100g Jar',
                'slug' => 'organic-green-mirchi-powder-100g',
                'category' => 'green_mirchi',
                'weight' => '100g Glass Jar',
                'price' => 199.00,
                'original_price' => 249.00,
                'stock' => 60,
                'image' => 'images/products/green-mirchi.jpg',
                'description' => '100% natural sun-dried organic green chili powder handcrafted without any chemical additives or artificial coloring.',
                'is_active' => true,
            ],
            [
                'name' => 'Homemade Organic Green Mirchi Powder (Hari Mirch) - 250g Pack',
                'slug' => 'organic-green-mirchi-powder-250g',
                'category' => 'green_mirchi',
                'weight' => '250g Eco Pack',
                'price' => 399.00,
                'original_price' => 499.00,
                'stock' => 45,
                'image' => 'images/products/green-mirchi.jpg',
                'description' => 'Pure shade-dried green chilies stone-ground to preserve original capsaicin, tangy heat, and zesty aroma.',
                'is_active' => true,
            ],

            // --- ORGANIC HALDI (TURMERIC) ---
            [
                'name' => 'Pure Organic Homemade Haldi (Turmeric) Powder - 250g Jar',
                'slug' => 'organic-haldi-powder-250g',
                'category' => 'haldi',
                'weight' => '250g Glass Jar',
                'price' => 249.00,
                'original_price' => 299.00,
                'stock' => 80,
                'image' => 'images/products/haldi-powder.jpg',
                'description' => 'High-curcumin (5%+) organic turmeric powder stone-ground from hand-picked fresh turmeric rhizomes.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Organic Homemade Haldi (Turmeric) Powder - 500g Value Pack',
                'slug' => 'organic-haldi-powder-500g',
                'category' => 'haldi',
                'weight' => '500g Pack',
                'price' => 449.00,
                'original_price' => 549.00,
                'stock' => 65,
                'image' => 'images/products/haldi-powder.jpg',
                'description' => 'Pure farm-fresh golden turmeric powder providing immunity support, anti-inflammatory goodness, and rich color.',
                'is_active' => true,
            ],

            // --- ORGANIC LAL MIRCH (RED CHILI) ---
            [
                'name' => 'Organic Handmade Mathania Lal Mirch Powder - 250g Jar',
                'slug' => 'mathania-lal-mirch-powder-250g',
                'category' => 'lal_mirch',
                'weight' => '250g Glass Jar',
                'price' => 279.00,
                'original_price' => 349.00,
                'stock' => 70,
                'image' => 'images/products/lal-mirch.jpg',
                'description' => 'Authentic handpicked Mathania red chili powder known for its vibrant deep red color and balanced pleasant spicy aroma.',
                'is_active' => true,
            ],
            [
                'name' => 'Organic Handmade Mathania Lal Mirch Powder - 500g Pack',
                'slug' => 'mathania-lal-mirch-powder-500g',
                'category' => 'lal_mirch',
                'weight' => '500g Pack',
                'price' => 499.00,
                'original_price' => 629.00,
                'stock' => 55,
                'image' => 'images/products/lal-mirch.jpg',
                'description' => 'Traditionally hand-pounded sun-dried red chilies free from added oils, color agents, or synthetic additives.',
                'is_active' => true,
            ],

            // --- HOMEMADE SPICES & OILS ---
            [
                'name' => 'Pure Organic Homemade Dhaniya (Coriander) Powder - 200g Jar',
                'slug' => 'organic-dhaniya-powder-200g',
                'category' => 'spices',
                'weight' => '200g Glass Jar',
                'price' => 179.00,
                'original_price' => 219.00,
                'stock' => 90,
                'image' => 'images/products/dhaniya-powder.jpg',
                'description' => 'Aromatic organic coriander powder stone-ground from freshly roasted premium coriander seeds.',
                'is_active' => true,
            ],
            [
                'name' => 'Whole Organic Cumin Seeds (Jeera) - 250g Jar',
                'slug' => 'organic-jeera-seeds-250g',
                'category' => 'spices',
                'weight' => '250g Glass Jar',
                'price' => 219.00,
                'original_price' => 269.00,
                'stock' => 75,
                'image' => 'images/products/dhaniya-powder.jpg',
                'description' => 'Aromatic farm-fresh whole organic cumin seeds rich in natural essential oils.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Cold-Pressed Kachi Ghani Mustard Oil - 1 Litre Bottle',
                'slug' => 'kachi-ghani-mustard-oil-1l',
                'category' => 'spices',
                'weight' => '1 Litre Glass Bottle',
                'price' => 329.00,
                'original_price' => 399.00,
                'stock' => 50,
                'image' => 'images/products/hero.png',
                'description' => '100% natural raw cold-pressed wood-pressed mustard oil extracted at room temperature.',
                'is_active' => true,
            ],
            [
                'name' => 'Organic Dry Mango Powder (Amchur) - 200g Jar',
                'slug' => 'organic-amchur-powder-200g',
                'category' => 'spices',
                'weight' => '200g Glass Jar',
                'price' => 189.00,
                'original_price' => 229.00,
                'stock' => 60,
                'image' => 'images/products/haldi-powder.jpg',
                'description' => 'Tangy sun-dried raw mango powder prepared traditionally without additives.',
                'is_active' => true,
            ],

            // --- HERBAL & WELLNESS ---
            [
                'name' => 'Organic Tulsi Green Tea - 100g Eco Can',
                'slug' => 'organic-tulsi-green-tea-100g',
                'category' => 'herbal_wellness',
                'weight' => '100g Eco Can',
                'price' => 299.00,
                'original_price' => 369.00,
                'stock' => 85,
                'image' => 'images/products/green-mirchi.jpg',
                'description' => 'Antioxidant-rich organic green tea infused with sacred Rama, Krishna, and Vana Tulsi leaves.',
                'is_active' => true,
            ],
            [
                'name' => 'Pure Raw Wildflower Honey - 500g Glass Jar',
                'slug' => 'pure-raw-wildflower-honey-500g',
                'category' => 'herbal_wellness',
                'weight' => '500g Glass Jar',
                'price' => 499.00,
                'original_price' => 599.00,
                'stock' => 50,
                'image' => 'images/products/ghee-500g.png',
                'description' => 'Unfiltered 100% natural raw honey harvested from wild forest blossoms.',
                'is_active' => true,
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(
                ['slug' => $prod['slug']],
                $prod
            );
        }
    }
}
