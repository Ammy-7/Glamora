<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product(Request $request)

    {
        $validated = $request->validate([
        'product_id' => 'required',
        'product_name' => 'required',
        'product_price' => 'required',
        'product_desc' => 'required',
        'product_image' => 'image|mimes:jpg,png,jpeg'

    ]);
        

    }

}
