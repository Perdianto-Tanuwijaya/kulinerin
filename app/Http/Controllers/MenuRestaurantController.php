<?php

namespace App\Http\Controllers;

use App\Models\MenuRestaurant;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuRestaurantController extends Controller
{
    public function indexMenu($id)
    {
        $appetizer = MenuRestaurant::where('category', 'Appetizer')
            ->where('restaurant_id', $id)
            ->get();
        $mainCourses = MenuRestaurant::where('category', 'Main Course')
            ->where('restaurant_id', $id)
            ->get();
        $dessert = MenuRestaurant::where('category', 'Dessert')
            ->where('restaurant_id', $id)
            ->get();
        $beverages = MenuRestaurant::where('category', 'Beverages')
            ->where('restaurant_id', $id)
            ->get();
        // $restaurants->getCollection()->transform(function ($restaurant) {
        //     $restaurant->restaurantImage = strtok($restaurant->restaurantImage, ',');
        //     return $restaurant;
        // });
        $restaurants = Restaurant::find($id);

        return view('menu.index', compact( 'appetizer', 'mainCourses', 'dessert', 'beverages', 'restaurants'));
    }
}
