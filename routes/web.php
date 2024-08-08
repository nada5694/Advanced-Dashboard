<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    Auth\ResetPasswordController,
};

use App\Http\Controllers\DashboardController;

// use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\{
    HomeController, UserController,
    CategoryController, ProductController,
    OrderController,
};

use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// If any route is non-existing in the project, then 404 page will appear
Route::fallback(function(){
    return abort(404);
});

// Redirect the standard route or url "http://localhost:8000/" (www.example.com) to "http://localhost:8000/dashboard" (www.example.com/dashboard)
Route::middleware(['redirectToDashboard'])->group(function(){
    Route::get('/');
    Route::get('/home');
});

// use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ResetPasswordController::class, 'edit'])->name('profile.change-password');
    Route::put('/profile/change-password', [ResetPasswordController::class, 'update'])->name('profile.update-password');
});

// Route::resource('orders', OrderController::class);

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

Route::prefix('dashboard')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    /*-------------------  Users  --------------------------------*/
    Route::get('users/admins', [UserController::class, 'admins'])->name('users.admins');
    Route::get('users/moderators', [UserController::class, 'moderators'])->name('users.moderators');

    Route::resource('/users', UserController::class);
    /*-------------------  Categories  --------------------------------*/
    Route::resource('/categories', CategoryController::class);
    /*-------------------  Products  --------------------------------*/
    Route::resource('/products', ProductController::class);
    /*-------------------  Orders  --------------------------------*/
    Route::resource('/orders', OrderController::class);

});

Route::get('/my-dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('my-dashboard');
