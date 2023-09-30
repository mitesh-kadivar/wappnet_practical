<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\ReviewManagementController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/dashboard/{filter?}', [HomeController::class, 'dashboard'])->name('home');
    Route::get('changeStatus', [HomeController::class, 'changeStatus'])->name('review.status');
});


# Customer

Route::get('/customer/login',[CustomerController::class,'showCustomerLoginForm'])->name('customer.login-view');
Route::post('/customer',[CustomerController::class,'customerLogin'])->name('customer.login');

Route::get('/customer/register',[CustomerController::class,'showCustomerRegisterForm'])->name('customer.register-view');
Route::post('/customer/register',[CustomerController::class,'createCustomer'])->name('customer.register');


Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/customer/dashboard/{filter?}', [ProductController::class, 'list']);
    Route::get('/customer/press-order/{productId}', [ProductController::class, 'pressOrder']);
    Route::get('/customer/checkout', [ProductController::class, 'checkout']);
});