<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

// User
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('/UserLogout', [UserController::class, 'UserLogout']);

Route::middleware(['tokenAuth']) -> group(function() {

    // customer profile
    Route::post('/CreateProfile', [ProfileController::class, 'CreateProfile']);
    Route::get('/ReadProfile', [ProfileController::class, 'ReadProfile']);

    // Brand
    Route::get('/BrandList', [BrandController::class, 'BrandList']);

    // Category
    Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);
    
    // product
    Route::get('/ListProductByCategory', [ProductController::class, 'ListProductByCategory']);
});



