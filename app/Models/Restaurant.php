<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menuRestaurants()
    {
        return $this->hasMany(MenuRestaurant::class, 'restaurant_id');
    }

    // public function firstImage()
    // {
    //     if ($this->restaurantImage) {
    //         return explode(', ', $this->restaurantImage)[0];
    //     }
    //     return null;
    // }
}
