<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\bookDetailsController;
use App\Http\Controllers\DeleteBookController;
use App\Http\Controllers\EditBookController;
use App\Http\Controllers\stockLevelController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\RegisterController;
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

Route::get('/admin', AdminHomeController::class)->name('adminHome');

Route::get('/', UserHomeController::class)->name('userHome');

Route::get('/bookdetails', bookDetailsController::class)->name('bookDetails');

Route::get('/cart', ShoppingCartController::class)->name('cart');

Route::get('/stocklevel', stockLevelController::class)->name('stockLevel');

Route::get('/about', AboutController::class)->name('about');

Route::get('/contactus', ContactController::class)->name('contact_us');

Route::get('/edit_book', EditBookController::class)->name('edit_book');

Route::get('/delete_book', DeleteBookController::class)->name('delete_book');

Route::get('/register', RegisterController::class)->name('register');

Route::get('/login', LoginPageController::class)->name('login');
