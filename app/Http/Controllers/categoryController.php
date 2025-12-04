<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class categoryController extends Controller
{
public function add(Request $req)
{
    $data = $req->validate([
        'catename' => 'required|string|unique:categories,name|max:255',
        'desc' => 'nullable|string',
        'cateimage' => 'required|image|mimes:png,jpg,jpeg|max:2000'
    ]);
    $file=$req->file('cateimage')->store('images','public');
    $url=basename($file);

    $category=new Category();
    $category->name=$data['catename'];
    $category->desc=$data['desc'];
    $category->image=$url;
    $category->save();


    if($category){
        return redirect()->route('all_cate');
    }
    else{
        return back()->with('error','data not inserted!!!!');
    }

}
}
