<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuRestaurant;
use App\Models\User;

class RestaurantController extends Controller
{
    public function searchRestaurant(Request $request)
    {
        $search = $request->query('keyword');
        $location = $request->query('location');
        $restaurants = Restaurant::query();

        if ($search) {
            $searchWords = explode(' ', $search);
            $restaurants = $restaurants->where(function ($query) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $query->where(function ($q) use ($word) {
                        $q->where('restaurantName', 'like', '%' . $word . '%');
                        //   ->orWhere('restaurantAddress', 'like', '%' . $word . '%');
                    });
                }
            });
        }

        if ($location) {
            $locationWords = explode(' ', $location);
            $restaurants = $restaurants->where(function ($query) use ($locationWords) {
                foreach ($locationWords as $word) {
                    $query->where(function ($q) use ($word) {
                        $q->where('restaurantAddress', 'like', '%' . $word . '%');
                    });
                }
            });
        }

        $restaurants = $restaurants->paginate(5);
        $restaurants->getCollection()->transform(function ($restaurant) {
            $restaurant->restaurantImage = strtok($restaurant->restaurantImage, ',');
            return $restaurant;
        });
        return view('index.restaurantSearchIndex', compact('restaurants'));
    }
    public function indexRestaurants($id)
    {
        $restaurants = Restaurant::find($id);
        // $firstImage = $restaurants->restaurantImage->first();
        // die($firstImage);
        $images = explode(', ', $restaurants->restaurantImage);
        // $firstImage = $images[0] ?? null;
        // dd($firstImage);

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
        return view('index.restaurantIndex', compact('restaurants', 'images', 'appetizer', 'mainCourses', 'dessert', 'beverages'));
    }
}
