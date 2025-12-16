<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\validation;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('User.index');
});

// Route::get('/index', function () {
//     return view('user.index');
// });

//register data
Route::post('/registerData' , [authController::class , "Register"])->name('R_Data');

//loginPage
Route::post('/logindata' , [authController::class , "login"])->name('l_Data');

//logout
Route::get('/logout' , [authController::class , "logout"])->name('logout');

//Admin
Route::view('/dashboard', 'Admin.dashboard')->name('admin')->middleware(validation::class);
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

//Product//
Route::view('/product','Admin.product')->name('product');

//single-product//
Route::view('/single-product','User.single-product')->name('single-product');

//add-product//
Route::view('/add-product','User.add-product')->name('add-product');

// Products
Route::get('/Addproducts', [productController::class, 'add_pro'])->name('add-pro');
Route::post('/insert/product',[productController::class,'insert'])->name('insert-pro');
//All products
Route::get('/allproducts',[productController::class,'fetch_pro'])->name('all-pro');
//delete products
Route::get('/delete/product{id}',[productController::class,'delete_pro'])->name('delete-pro');
//Edit
Route::get('/editproduct/{id}', [productController::class, 'editpro'])->name('edit-pro');
Route::view('/updatecategory','Admin.EditCategory');
// Update category form submit 
Route::post('/productupdate/{id}', [productController::class, 'pro_update'])->name('pro-update');

//All orders
Route::get('/orders',[OrderController::class,'Orders'])->name('all-orders');

//contact
Route::view('/contact', 'user.contact')->name('contact');


// Shop //
Route::get('/shop', [productController::class,"fatchproduct"])->name('shop');
Route::get('/cart{id}', [productController::class,"cart"])->name('cart');

