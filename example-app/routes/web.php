<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

//Default
Route::get('/', function () {
    return view('auth.login');
})->name('landing-login');

//Login
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

//Admin
Route::group(['middleware' => 'checkrole:administrador'], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    //Users
    Route::get('/admin-dashboard/users', [AdminController::class, 'userIndex'])->name('admin-users');
    Route::post('/admin-dashboard/users/create', [AdminController::class, 'createUser'])->name('admin-users.create');
    //Inventory
    Route::get('/admin-dashboard/inventory', [AdminController::class, 'inventoryIndex'])->name('admin-inventory');
});

//User
Route::group(['middleware' => 'checkrole:usuario'], function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('user-dashboard');
});