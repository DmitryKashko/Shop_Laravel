<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminController::class, 'index'])->name('main.index');

/*Route::resource('categories', CategoryController::class);*/

Route::resources([
    'categories' => CategoryController::class,
    'tags' => TagController::class,
    'orders' => OrderController::class,
    'colors' => ColorController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'groups' => GroupController::class,
]);
