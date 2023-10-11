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

    // product review
    Route::post('/CreateProductReview', [ProductController::class, 'CreateProductReview']);
    

    
});

    // Brand
    Route::get('/BrandList', [BrandController::class, 'BrandList']);
    
    // Category
    Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);
    
    // product
    Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
    Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
    Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);
    Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
    Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);
    Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);
