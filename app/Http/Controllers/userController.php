<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
public function view()
{
    $number = 0;

    if (Auth::check()) {
        $number = Order::where('user_id', Auth::id())->count();
    }
    $cateitem=Category::all();
      

    return view('User.index', compact('number' ,'cateitem')); // homepage view
}


public function categoryProducts($name)
{
    $userid = Auth::id();

    $number = Order::where('user_id', $userid)->count();
     $cateitem=Category::all();
    $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', $name)
        ->select('products.*')
        ->get();

    return view('User.jewellry', compact('products', 'name' , 'cateitem','number'));
}






}
    



