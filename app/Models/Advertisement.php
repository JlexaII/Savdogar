<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'title', 'description', 'images', 'address', 'phone', 'is_active',
        'square_meters', 'car_description', 'subcategory_id', 'user_id', 'vehicle_type',
        'make', 'model', 'year', 
        'latitude', 'longitude',
        'price'
    ];

    protected $casts = [
        'images' => 'array', // Преобразование JSON в массив
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

