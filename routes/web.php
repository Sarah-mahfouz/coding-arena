<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contact',[PageController::class,'contact'])->name('contact');

Route::get('/admin',function (){
    return view('admin.dashboard');
});

Route::get('/admin/login' ,[AdminAuthController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login' ,[AdminAuthController::class,'login'])->name('admin.login.submit');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('categories',CategoryController::class);
    Route::resource('badges',BadgeController::class);
    Route::resource('challenges',ChallengeController::class);
});
