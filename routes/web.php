<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\godaunstockController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kachaProductController;
use App\Http\Controllers\monthReportController;
use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\userRegController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// ============== user registration ==========
Route::post('/user/reg', [userRegController::class, 'user_reg'])->name('user.reg');


// =========== profile ================
Route::get('/profile', [profileController::class, 'profile'])->name('profile');
Route::get('/profile/add', [profileController::class, 'profile_add'])->name('profile.add');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'godaun_stock'  => godaunstockController::class,
        'product' =>productController::class,
        'kacha_product' =>kachaProductController::class,
        'sale' =>saleController::class,
        'purchase'=> purchaseController::class,
        'customer'=> customerController::class,
        'seller'=>sellerController::class,
        'month_report'=>monthReportController::class,
    ]);
});

// sale
Route::get('/sale/details/{customer_id}', [saleController::class, 'sale_details'])->name('sale.details');
// purchase
Route::get('/purchase/details/{seller_id}', [purchaseController::class, 'purchase_details'])->name('purchase.details');

// monthly reports
Route::get('/month_report/all', [monthReportController::class, 'purchase_details_all'])->name('purchase.details.all');
Route::post('/month_report/all/reports', [monthReportController::class, 'all_reports'])->name('all.reports');

// product reports
Route::get('/product/all', [productController::class, 'product_all'])->name('product.all');
Route::post('/product/all/reports', [productController::class, 'product_all_reports'])->name('product.all.reports');

// product reports
Route::get('/kacha_product/all', [kachaProductController::class, 'kacha_product_all'])->name('kacha_product.all');
Route::post('/kacha_product/all/reports', [kachaProductController::class, 'kacha_product_all_reports'])->name('kacha_product.all.reports');
