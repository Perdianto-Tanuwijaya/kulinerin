<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
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
});

Route::middleware(['customer'])->group(function () {

    Route::get('/dashboardCustomer', [AuthController::class, 'customerDashboard'])->name('customerDashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboardAdmin', [AuthController::class, 'adminDashboard'])->name('adminDashboard');
});

Route::middleware(['restaurant'])->group(function () {

    Route::get('/dashboardRestaurant', [AuthController::class, 'restaurantDashboard'])->name('restaurantDasboard');
});

// Route::post('dashboardCustomer', [AuthController::class, 'register']);

// Route::middleware('auth')->get('/dashboard', function () {
//     return view('dashboard.customerDashboard');
// });
// Route::post('dashboard', [AuthController::class, 'login']);

// Route::get('/', function () {
//     return view('dashboard');
// });