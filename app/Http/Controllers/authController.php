<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
  public function Register(Request $req){
$data=$req->validate([
    'name'=>"required",
    'email'=>"required |email|unique:Users,email",
    'password'=>"required",
]);
   $user=User::create($data);


if($user){
    return redirect()->route('login')->with('success','Registered successfully....');
}
else{
    return back()->with('error','Registration failed!!!');
}
}


public function login(Request $l_req){
    $Logindata=$l_req->validate([

        'email'=>"required|email",
        'password'=>"required",
    ]);

    if(Auth::attempt($Logindata)){
        return redirect()->route('admin');

    }
    else{
        return back()->with("error" ,'User not found....');
    }
}
public function logout(){
    auth::logout();
    return view('auth.login');
}



// fetchdata

public function fetch(){
    $users = User::all();

    return view('admin.Allusers',compact('users'));
}



// deleteData

public function delete($id){
    $dlt=User::destroy($id);
return redirect()->route('fetch-user');
}
}
