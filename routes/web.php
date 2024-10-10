<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\authController;

Route::get('/', function () {
    return view('home');
});
Route::group(['prefix'=>'users'],function(){
    Route::get('show',[usuariosController::class,'show'])->name('show.users');
    Route::post('store',[usuariosController::class,'store'])->name('store.users');
    Route::get('create',[usuariosController::class,'create'])->name('create.users');
    Route::get('update/{id}',[usuariosController::class,'update'])->name('update.users');
    Route::get('delete/{id}',[usuariosController::class,'delete'])->name('delete.users');
});
Route::get('home',[homeController::class,'home'])->name('home');

Route::get('login',[authController::class,'auth'])->name('login');

// Route::middleware(['auth'])->group(function(){
//     Route::get('users',[usuariosController::class,'show'])->name('show.users');
// });