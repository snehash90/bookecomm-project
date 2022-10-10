<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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

Auth::routes();

// Admin Route
Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('home', [HomeController::class, 'adminHome'])
        ->name('admin.home');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])
        ->name('admin.dashboard');

    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])
        ->name('admin.profile');

    Route::get('/profile/edit', [AdminProfileController::class, 'AdminEditProfile'])
        ->name('admin.profile.edit');

    Route::post('/profile/store', [AdminProfileController::class, 'AdminProfileStore'])
        ->name('admin.profile.store');

    Route::get('/change/password', [AdminProfileController::class, 'AdminChangePassword'])
        ->name('admin.change.password');

    Route::post('/update/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])
        ->name('update.change.password');

    Route::get('/login', [AdminController::class, 'destroy'])->name('admin.logout');
});




// User Route

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::prefix('user')->group(function () {

    Route::get('/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
    Route::get('/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.store');

    Route::get('/changepassword', [IndexController::class, 'UserChangePassword'])->name('user.change.password');

    Route::post('/updatepassword', [IndexController::class, 'UserUpdatePassword'])->name('user.update.password');
});


Route::get('/', [IndexController::class, 'Index']);

// Route::get('/', function () {
//     return view('welcome');
// });