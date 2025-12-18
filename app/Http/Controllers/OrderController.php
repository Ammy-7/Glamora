<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Place_order;
use App\Models\PlaceOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function Orders()
    {     
    $userid = Auth::id();

    $number = Order::where('user_id', $userid)->count();

    $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->select(
            'orders.id',
            'products.price',
            'orders.quentity',
            'users.name as user_name',
            'users.email',
            'products.name as product_name',
            'products.image as product_image'
        )
        ->get();

    return view('Admin.order', compact('orders', 'number'));

   
}
function cartshow()
{
    $userid = Auth::id();

    $number = Order::where('user_id', $userid)->count();

    $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userid)
        ->select(
            'orders.id',
            'products.price',
            'orders.quentity',
            'users.name as user_name',
            'users.email',
            'products.name as product_name',
            'products.image as product_image'
        )
        ->get();

    return view('User.cartshow', compact('orders', 'number'));
}
public function Remove($id){
 $Remove=Order::destroy($id);

return redirect()->route('cartshow');

}
 public function index()
    {
          $userid = Auth::id();

    $number = Order::where('user_id', $userid)->count();
        return view('User.checkout',compact('number'));
    }



public function checkout()

{

$userid = Auth::id();



      $userid = Auth::id();

    $number = Order::where('user_id', $userid)->count();
    $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userid)
        ->select(
            'orders.id',
            'products.price',
            'orders.quentity',
            'users.name as user_name',
            'users.email',
            'products.name as product_name',
            'products.image as product_image'
        )
        ->get();
    

    // subtotal calculate
    $subtotal = 0;
     $count=DB::select("select count(quentity) from orders");
    foreach ($orders as $order) {
       
     $subtotal += $order->price * $order->quentity;
    }

    $delivery = 250;
    $total = $subtotal + $delivery;
    //return $subtotal;

   return view('User.checkout', compact('orders', 'subtotal', 'delivery', 'total' ,'number'));
}

public function placeOrder(Request $request)
{
    // Server-side validation
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'phone'   => 'required|string|max:20',
        'email'   => 'required|email|max:255',
        'address' => 'required|string|max:500',
        'notes'   => 'nullable|string|max:500',
        'payment' => 'required|in:cod,online',
    ]);

    // Order create logic (example)
    $order = new Place_order();
    $order->user_id = Auth::id();
    $order->name = $validated['name'];
    $order->phone = $validated['phone'];
    $order->email = $validated['email'];
    $order->address = $validated['address'];
    $order->notes = $validated['notes'] ?? null;
    $order->payment_method = $validated['payment'];
    $order->subtotal = session('subtotal'); // example
    $order->delivery = session('delivery'); // example
    $order->total = session('total');       // example
    $order->save();

    return redirect()->route('home')->with('success', 'Order placed successfully!');
}





}
