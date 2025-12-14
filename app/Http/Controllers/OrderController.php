<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    
    public function Orders()
    {     
 $orders = Order::with(['user', 'product'])->get();

//return redirect()->route('all-orders', compact('orders'));
   
}

}
