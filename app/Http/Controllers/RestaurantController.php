<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantController extends Controller
{
    public function search (Request $request){
        $search = $request->get('search');

        $restaurants = User::query();

        if ($search) {
            $restaurants = $restaurants->where('restaurantName', 'like', '%' . $search . '%');
        }

        $restaurants = $restaurants->paginate(5); 

        return view('index.restaurantIndex', compact('restaurants'));
    }
    // public function showRestaurants()
    // {
    //     $restaurants = Restaurant::random()->takes(3)->get();

    //     return view('dashboard.customerDashboard', compact('restaurants'));
    // }
}
