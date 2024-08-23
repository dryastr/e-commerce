<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\manajemen\CategoriesController;
use App\Http\Controllers\admin\manajemen\ProductController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role->name === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.home');
        }
    }
    return view('user.dashboard');
})->name('home');

Auth::routes();

Route::middleware(['auth', 'role.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/', [UserController::class, 'index'])->name('user.home');

Route::resource('testimonial-user', UserController::class)->only(['store']);
