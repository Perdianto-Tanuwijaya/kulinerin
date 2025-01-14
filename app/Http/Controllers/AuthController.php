<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Flasher\Toastr\Prime\ToastrInterface;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        if (!$googleUser || !$googleUser->email) {
            return redirect()->route('login')->withErrors('Failed to retrieve Google account information.');
        }

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'email' => $googleUser->email,
                'role' => 1,
                'password' => Hash::make(rand(100000, 999999))
            ]);
        }
        

        Auth::login($user);

        return redirect()->route('customerDashboard')->withSuccess('Login Success');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:8|required_with:confirmation_password|same:confirmation_password',
            'confirmation_password' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->save();

        return redirect('/login')->with('success', 'Your account has been created!');
    }

    public function showLoginForm()
    {
        return view('auth.loginForm');
    }

    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Find the user by email
        $user = User::where('email', $credentials['email'])->first();
        // compact('user');
        // Check if the user exists and if the password matches
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Log the user in
            Auth::login($user);

            if ($user->role == 1) {
                return redirect()->route('customerDashboard', compact('user'))->withSuccess('Login Success');
                // ->withSuccess('Login Success');
            } else if ($user->role == 2) {
                // toastr()->success('Login Success');
                return redirect()->route('adminDashboard', compact('user'))->withSuccess('Login Success');
            } else if ($user->role == 3) {
                // toastr()->success('Login Success');
                return redirect()->route('restaurantDashboard', compact('user'))->withSuccess('Login Success');
            }
        } else {
            // If authentication fails, redirect back with an error message
            return back()->withErrors([
                'email' => 'Login Failed Credential Not Match.',
            ])->onlyInput('email');
        }
    }
    public function customerDashboard()
    {
        return view('dashboard.customerDashboard');
    }
    public function adminDashboard()
    {
        return view('dashboard.adminDashboard');
    }
    public function restaurantDashboard()
    {
        return view('dashboard.restaurantDashboard');
    }


    public function showRegisterRestaurantForm()
    {
        return view('auth.registerRestaurant');
    }
    public function registerestaurant(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'restaurantName' => 'required',
            'restaurantPhoneNumber' => 'required',
            'restaurantLocation' => 'required',
            'restaurantDescription' => 'required',
            'restaurantCity' => 'required',
            'password' => 'required|alpha_num|min:8|required_with:confirmation_password|same:confirmation_password',
            'confirmation_password' => 'required',
        ]);

        $restaurant = new User();
        $restaurant->email = $request->email;
        $restaurant->restaurantName = $request->restaurantName;
        $restaurant->restaurantPhoneNumber = $request->restaurantPhoneNumber;
        $restaurant->restaurantLocation = $request->restaurantLocation;
        $restaurant->restaurantDescription = $request->restaurantDescription;
        $restaurant->restaurantCity = $request->restaurantCity;
        $restaurant->password = bcrypt($request->password);
        $restaurant->role = 3;
        $restaurant->save();

        return redirect('/login')->with('success', 'Your account has been created successfully!');
    }



    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate CSRF token
        return redirect('/')->with('success', 'Logout Successfull!');
    }
}