<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'weight',
        'price',
        'original_price',
        'stock',
        'image',
        'description',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public static function categories(): array
    {
        return [
            'desi_ghee' => 'Organic Desi Ghee',
            'green_mirchi' => 'Green Mirchi Powder',
            'haldi' => 'Organic Haldi (Turmeric)',
            'lal_mirch' => 'Organic Lal Mirch',
            'spices' => 'Spices & Oils',
            'herbal_wellness' => 'Herbal & Wellness',
            'other' => 'Other Organic Products',
        ];
    }

    public function getCategoryNameAttribute(): string
    {
        return static::categories()[$this->category] ?? ucfirst(str_replace('_', ' ', $this->category));
    }
}
