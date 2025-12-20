<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    public function add_pro(){
        $category=Category::all();
        return view('Admin.products.addpro',compact('category'));
    }
public function insert(Request $P_req)
{
    $data = $P_req->validate([
        'pro_name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'desc' => 'nullable|string',
        'pro_image' => 'required|image|mimes:png,jpg,jpeg|max:2000',
        'category_id' => 'required|exists:categories,id',
    ]);

    $file = $P_req->file('pro_image')->store('product-images', 'public');
    $url = basename($file);

    $product = new Product();
    $product->name = $data['pro_name'];
    $product->desc = $data['desc'];
    $product->price = $data['price'];
    $product->quantity = $data['quantity'];
    $product->image = $url;
    $product->category_id = $data['category_id'];
    $product->save();
    

    if($product){
        return redirect()->route('all-pro')->with('success','data insert successfully...');
    }
    else{
        return back()->with('error','data not inserted!!!!');
    }

}
// fetch products

public function fetch_pro(){
    $product_data =Product::with('category')->get();

    return view('Admin.products.allproducts',compact('product_data'));
}


// delete product
public function delete_pro($id){
    $dltproduct=Product::destroy($id);

return redirect()->route('all-pro');
}

// Edit products

public function editpro($id){
    $productData=Product::find($id);
    $category=Category::all();

    return view('Admin.products.edit',compact('productData','category'));
}
 // Update function
    public function pro_update(Request $request, $id)
    {
       

        $product = Product::find($id);

        $product->name = $request->pro_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;
        $product->category_id = $request->category_id;

        // Agar image upload hui hai
          if ($request->hasFile('pro_image')) {

        // Delete old
        $oldPath = storage_path('app/public/product-images/' . $product->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        // Upload new
        $file = $request->file('pro_image')->store('product-images', 'public');
        $product->image = basename($file);
    }

    $product->save();

        return redirect()->route('all-pro')->with('success', 'Product updated successfully!');
    }


function fatchproduct(){

    $products=Product::all();
     $cateitem=Category::all();
                $userid=Auth::user()->id;
$number = Order::where('user_id', $userid)->count();
    return view('User.shop',compact('products','number','cateitem'));

}

function cart($id){
    $product=Product::find($id);
    $userid=Auth::user()->id;

    $order=new Order();
    $order->product_id=$product->id;
    $order->user_id=$userid;
    $order->quentity=1;
$order->save();
    if($order){
        return redirect()->route('shop');
    }
    else{
        return redirect()->route('shop');
    }


    
}




}


