<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\categoryController;
use App\Http\Middleware\validation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.index');
});

// Route::get('/index', function () {
//     return view('user.index');
// });

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
Route::view('/dashboard', 'Admin.dashboard')->name('admin'); //->middleware(validation::class);
//sidebar
Route::view('/sidebar','Admin.sidebar')->name('sidebar');

//users
Route::view('/indexPage', 'user.index')->name('index');

// Allusers
Route::get('/Allusers',[authController::class,'fetch'])->name('fetch-user');

//deleteuser
Route::get('/deleteUser{id}',[authController::class,'delete'])->name('delete-user');



// Edit user page
Route::get('/edituser/{id}', [authController::class, 'edit'])->name('edit');
Route::view('/update','Admin.updateuser')->name('updatePage');
// Update user form submit 
Route::post('/userupdate/{id}', [authController::class, 'update'])->name('user.update');

//categories
Route::view('/categories','Admin.add-category')->name('cate');
Route::post('/addcategory',[categoryController::class,'add'])->name('add-cate');
// All categories
Route::get('/allcategories',[categoryController::class,'fetchCate'])->name('all-cate');
//delete Category
Route::get('/deletecategory{id}',[categoryController::class,'delete_cate'])->name('delete-cate');

//Edit
Route::get('/editcategory/{id}', [categoryController::class, 'editCate'])->name('edit-cate');
Route::view('/updatecategory','Admin.EditCategory');
// Update category form submit 
Route::post('/Categoryupdate/{id}', [categoryController::class, 'cateupdate'])->name('cate-update');
