<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
        
    use HasFactory;
    /**
     * Get category that belongs to products.
     */
    public function category()
    {
        return $this->belongsTo( Category::class, 'category_id' );
    }
}