<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
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


Route::get('/', [HomeController::class, 'HomePage']);

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
    
    // wish list
    Route::get('/CreateWishList/{product_id}', [ProductController::class, 'CreateWishList']);
    Route::get('/ProductWishList', [ProductController::class, 'ProductWishList']);
    Route::get('/RemoveWishList/{product_id}', [ProductController::class, 'RemoveWishList']);

    // cart list
    Route::post('/CreateCartList', [ProductController::class, 'CreateCartList']);
    Route::get('/CartList', [ProductController::class, 'CartList']);
    Route::get('/DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList']);

    // invoice
    Route::get("/InvoiceCreate", [InvoiceController::class, 'InvoiceCreate']);
    Route::get("/InvoiceList", [InvoiceController::class, 'InvoiceList']);
    Route::get("/InvoiceProductList/{invoice_id}", [InvoiceController::class, 'InvoiceProductList']);
    

    
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

    // payment
    Route::post("/PaymentSuccess",[InvoiceController::class,'PaymentSuccess']);
    Route::post("/PaymentCancel",[InvoiceController::class,'PaymentCancel']);
    Route::post("/PaymentFail",[InvoiceController::class,'PaymentFail']);

    // policy
    Route::get("/PolicyByType/{type}", [PolicyController::class, 'PolicyByType']);
