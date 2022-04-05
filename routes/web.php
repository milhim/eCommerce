<?php

use App\Http\Controllers\ProductController;
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


/*Login and logout routes*/

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginProcess'])->name('loginProcess');
Route::get('/register', [UserController::class, 'register'])->name('register');


Route::group(['middleware' => ['auth']], function () {

});

Route::get('/', [ProductController::class, 'index'])->name('index');
/*products  routes*/

Route::get('/detail/{id}', [ProductController::class, 'showDetail'])->name('product.detail');
Route::post('/detail/add_to_cart', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::post('/cart/repmove/{id}', [ProductController::class, 'remove'])->name('remove-from-cart');
Route::get('/ordernow', [ProductController::class, 'orderNow'])->name('ordernow');
Route::post('/ordernow/placeorder', [ProductController::class, 'placeOrder'])->name('placeorder');

Route::get('/cart/detail/{user_id}', [UserController::class, 'showCart'])->name('cart.list');

Route::get('/myorders', [ProductController::class, 'showOrders'])->name('myorders');


