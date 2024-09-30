<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\homeController;

Route::get('/', function () {
    return view('home');
});
Route::get('home',[homeController::class,'home'])->name('home');
Route::get('users',[usuariosController::class,'show'])->name('show.users');

// Route::middleware(['auth'])->group(function(){
//     Route::get('users',[usuariosController::class,'show'])->name('show.users');
// });