<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/search', [RestaurantController::class, 'search'])->name('search');
// Route::get('/search', [RestaurantController::class, 'search'])->name('search');
Route::post('search', [RestaurantController::class, 'search']);




Route::middleware(['guest'])->group(function () {

    Route::get('/', function () {
    return view('dashboard.guestdashboard');
    });
    // Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    Route::post('login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    Route::post('register', [AuthController::class, 'register']);

    Route::get('/registerrestaurant', [AuthController::class, 'showRegisterRestaurantForm'])->name('registerRestaurant');

    Route::post('registerrestaurant', [AuthController::class, 'registerestaurant']);
    
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['customer'])->group(function () {

    Route::get('/dashboardCustomer', [AuthController::class, 'customerDashboard'])->name('customerDashboard');
    Route::post('/dashboardCustomer', [RestaurantController::class, 'showRestaurants']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboardAdmin', [AuthController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/logoutAdmin', [AuthController::class, 'logout'])->name('logout');
    
});

Route::middleware(['restaurant'])->group(function () {

    Route::get('/dashboardRestaurant', [AuthController::class, 'restaurantDashboard'])->name('restaurantDashboard');
    Route::get('/logoutRestaurant', [AuthController::class, 'logout'])->name('logout');
});