<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserHomeController;
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

Route::get('/admin', AdminHomeController::class)->name('adminhome');

Route::get('/user', UserHomeController::class)->name('userhome');

Route::get('about', AboutController::class)->name('about');

Route::get('contactUs', ContactController::class)->name('contact_us');