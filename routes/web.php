<?php

use App\Http\Controllers\MenuRestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReservationController;
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
// Route::post('search', [RestaurantController::class, 'searchRestaurant']);




Route::middleware(['guest'])->group(function () {

    Route::get('/', [GuestController::class, 'guestDashboard'])->name('guestDashboard');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    Route::post('login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    Route::post('register', [AuthController::class, 'register']);

    Route::get('/registerrestaurant', [AuthController::class, 'showRegisterRestaurantForm'])->name('registerRestaurant');

    Route::post('registerrestaurant', [AuthController::class, 'registerestaurant']);

    Route::get('/search', [GuestController::class, 'searchRestaurantbyGuest'])->name('search');
});

Route::middleware(['customer'])->group(function () {

    Route::get('/dashboardCustomer', [CustomerController::class, 'customerDashboard'])->name('customerDashboard');
    Route::post('/dashboardCustomer', [RestaurantController::class, 'showRestaurants']);

    Route::get('/searchRestaurant', [RestaurantController::class, 'searchRestaurant'])->name('searchRestaurant');
    Route::get('/restaurantIndex/{id}', [RestaurantController::class, 'indexRestaurants'])->name('indexRestaurants');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('booking', [ReservationController::class, 'booking'])->name('booking');

    Route::get('/restaurantMenu/{id}', [MenuRestaurantController::class, 'indexMenu'])->name('indexMenu');

    Route::get('/detailOrder', [ReservationController::class, 'detailOrder'])->name('detailOrder');

    // Route::get('/detailOrder', function () {
    //     return view('order.orderDetail');
    // });
});

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboardAdmin', [AuthController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/logoutAdmin', [AuthController::class, 'logout'])->name('logoutAdmin');
});

Route::middleware(['restaurant'])->group(function () {

    Route::get('/dashboardRestaurant', [AuthController::class, 'restaurantDashboard'])->name('restaurantDashboard');
    Route::get('/logoutRestaurant', [AuthController::class, 'logout'])->name('logoutRestaurant');
});
