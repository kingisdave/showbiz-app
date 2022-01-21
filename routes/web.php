<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardBlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\PayPalController;

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

// Route::get('/', function () {
//     return view('pages.welcome');
// });
// Route::get('/', 'PagesController@welcome');
Route::get('/', [PagesController::class, 'welcome']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/contact', [PagesController::class, 'contact']);

// Route::get('/ecommerce', function () {
    //     return view('pages.ecommerce');
    // });
// Route::get('/cart', function () {
//     return view('pages.cart');
// });
// Route::get('/blog', function () {
    //     return view('pages.blogpage');
    // });

Route::resource('blogs', BlogsController::class);
Route::resource('blog.comments', CommentsController::class)->shallow();
Route::get('/shop', [PagesController::class, 'shops']);
Route::resource('cart', CartsController::class)->only(['index', 'store', 'update', 'destroy']);

Route::get('/auth/redirect/{provider}', [GoogleLoginController::class, 'redirect']);
Route::get('/callback/{provider}', [GoogleLoginController::class, 'callback']);

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('dashboard/blog/category', [BlogCategoriesController::class, 'store']);
Route::post('dashboard/store/category', [ProductCategoryController::class, 'store']);

Route::resource('dashboard/blog', DashboardBlogsController::class);
Route::resource('dashboard/store/order', OrdersController::class);
Route::resource('dashboard/store/product', ProductsController::class);
Route::resource('dashboard/store/stock', StocksController::class);
Route::resource('/dashboard/store', ShopsController::class);

// Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
// Route::post('/payment-page', [PaymentController::class, 'index']);
// Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
Route::get('/verify-payment/{reference}', [PaymentController::class, 'verify']);


// Route::get('handlepayment', [PayPalController::class, 'handlePayment'])->name('payment');
// Route::get('cancelpayment', [PayPalController::class, 'cancelPayment'])->name('cancelled');
// Route::get('paymentsuccess', [PayPalController::class, 'paymentSuccess'])->name('succeded');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
