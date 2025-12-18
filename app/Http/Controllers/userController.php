<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
public function view()
{
    $number = 0;

    if (Auth::check()) {
        $number = Order::where('user_id', Auth::id())->count();
    }

    return view('User.index', compact('number')); // homepage view
}


//     function view(){
//             $userid=Auth::user()->id;
// $number = Order::where('user_id', $userid)->count();
//         return view("User.navbar",compact('number'));
//     }
public function category(){
        $category=Category::all();
        return view('User.navbar',compact('category'));
    }
}
