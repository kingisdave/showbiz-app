<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogsController;
// use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardBlogsController;

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
Route::get('/cart', function () {
    return view('pages.cart');
});
// Route::get('/blog', function () {
    //     return view('pages.blogpage');
    // });
    
Route::resource('blog', BlogsController::class);
Route::resource('blog.comments', CommentsController::class)->shallow();
Route::resource('shop', ShopsController::class);

Route::get('/auth/redirect/{provider}', [GoogleLoginController::class, 'redirect']);
Route::get('/callback/{provider}', [GoogleLoginController::class, 'callback']);

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/store', [DashboardController::class, 'shopper']);
Route::post('dashboard/blog/category', [BlogCategoriesController::class, 'store']);
// Route::get('dashboard/blog/category', [BlogCategoryController::class, 'index']);
// Route::resource('dashboard/blog/category', BlogCategoryController::class)->only(['index', 'store']);
Route::resource('dashboard/blog', DashboardBlogsController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
