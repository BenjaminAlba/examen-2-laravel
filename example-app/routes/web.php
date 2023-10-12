<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

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
    Route::post('/admin-dashboard/inventory/create', [ProductoController::class, 'create'])->name('admin-inventory.create');
    Route::delete('/admin-dashboard/inventory/delete/{producto}', [ProductoController::class, 'delete'])->name('admin-inventory.delete');
    Route::get('/admin-dashboard/inventory/edit/{producto}', [ProductoController::class, 'edit'])->name('admin-inventory.edit');
    Route::put('/admin-dashboard/inventory/update/{producto}', [ProductoController::class, 'update'])->name('admin-inventory.update');
});

//User
Route::group(['middleware' => 'checkrole:usuario'], function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('user-dashboard');
    //Inventory-Global
    Route::get('/user-dashboard/inventory/global', [UserController::class, 'globalInventoryIndex'])->name('user-globalInventory');
    //Inventory-Personal
    Route::get('/user-dashboard/inventory/personal', [UserController::class, 'personalInventoryIndex'])->name('user-personalInventory');
    Route::post('/user-dashboard/inventory/personal/create', [ProductoController::class, 'create'])->name('user-personalInventory.create');
    Route::delete('/user-dashboard/inventory/personal/delete/{producto}', [ProductoController::class, 'delete'])->name('user-personalInventory.delete');
    Route::get('/user-dashboard/inventory/personal/edit/{producto}', [ProductoController::class, 'edit'])->name('user-personalInventory.edit');
    Route::put('/user-dashboard/inventory/personal/update/{producto}', [ProductoController::class, 'update'])->name('user-personalInventory.update');
    //Edit Password
    Route::get('/user-dashboard/credentials', [UserController::class, 'credentialsIndex'])->name('user-credentials');
    Route::put('/user-dashboard/credentials/update', [UserController::class, 'changePassword'])->name('user-credentials.update');
});