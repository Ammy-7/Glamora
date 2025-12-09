<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

}
