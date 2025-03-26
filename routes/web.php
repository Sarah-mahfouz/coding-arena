<?php

use App\Http\Controllers\CategoryController;
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
Route::prefix('admin')->group(function () {
    Route::resource('categories',CategoryController::class);

});

