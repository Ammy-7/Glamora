<?php

use App\Http\Controllers\authController;
use App\Http\Middleware\validation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('user.index');
});

//register
Route::view('/RegisterPage', 'auth.register')->name('Register');

//register data
Route::post('/registerData' , [authController::class , "Register"])->name('R_Data');
//loginPage
Route::view('/login_page', 'auth.login')->name('login');
Route::post('/logindata' , [authController::class , "login"])->name('l_Data');

//logout
Route::get('/logout' , [authController::class , "logout"])->name('logout');
//Admin
Route::view('/dashboard', 'admin.dashboard')->name('admin')->middleware(validation::class);
//users
Route::view('/indexPage', 'user.index')->name('index');
//sidebar
Route::view('/sidebar','admin.sidebar')->name('sidebar');
// Allusers
Route::get('/Allusers',[authController::class,'fetch'])->name('fetch-user');

//deleteuser
Route::get('/deleteUser{id}',[authController::class,'delete'])->name('delete-user');