<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    Auth::logout();
    return view('Auth.login');
}



// fetchdata

public function fetch(){
    $users = User::all();

    return view('Admin.Allusers',compact('users'));
}



// deleteData

public function delete($id){
    $dlt=User::destroy($id);
return redirect()->route('fetch-user');
}
//edituser
public function edit($id){
    $data=User::find($id);
    return view('Admin.updateuser',compact('data'));
}
//update users

public function update(Request $U_req,$id){
$data=User::find($id);

$data->name=$U_req->name;
$data->email=$U_req->email;
$data->role=$U_req->role;
if($data->save()){
    return redirect()->route('fetch-user')->with('success','user updated successfully....');
}
else{
    return back()->with('error','user not updated!!!!');
}
}
}





