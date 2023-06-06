<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'image',
    ];

    // Add any additional methods or relationships as needed

    // Example accessor method for the image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Assuming your images are stored in the public folder
            return asset('storage/' . $this->image);
        }

        return null;
    }
}
