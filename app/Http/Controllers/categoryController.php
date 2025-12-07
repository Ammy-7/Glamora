<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\error;

class categoryController extends Controller
{
public function add(Request $req)
{
    $data = $req->validate([
        'catename' => 'required|string|unique:categories,name|max:255',
        'desc' => 'nullable|string',
        'cateimage' => 'required|image|mimes:png,jpg,jpeg |max:2000'
    ]);
    $file=$req->file('cateimage')->store('images','public');
    $url=basename($file);

    $category=new Category();
    $category->name=$data['catename'];
    $category->desc=$data['desc'];
    $category->image=$url;
    $category->save();


    if($category){
        return redirect()->route('all-cate');
    }
    else{
        return back()->with('error','data not inserted!!!!');
    }

}
// fetch Category

public function fetchCate(){
    $cateData = Category::all();

    return view('Admin.allcategory',compact('cateData'));
}


// delete Category

public function delete_cate($id){
    $dlt_cate=Category::destroy($id);
return redirect()->route('all-cate');
}

// Edit Category

public function editCate($id){
    $data=Category::find($id);
    return view('Admin.EditCategory',compact('data'));
}

// update Category

public function cateupdate(Request $req, $id)
{
    $category = Category::find($id);

    $req->validate([
        'catename' => 'required|string|max:255',
        'desc' => 'nullable|string',
        'cateimage' => 'required|image|mimes:png,jpg,jpeg|max:2000'
    ]);

    $category->name = $req->catename;
    $category->desc = $req->desc;

    if ($req->hasFile('cateimage')) {

        // Delete old
        $oldPath = storage_path('app/public/images/' . $category->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        // Upload new
        $file = $req->file('cateimage')->store('images', 'public');
        $category->image = basename($file);
    }

    $category->save();

    return redirect()->route('all-cate')
        ->with('successfull', 'Category updated successfully...');
}

}