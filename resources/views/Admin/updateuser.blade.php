@extends('Admin.sidebar')
@section('admin')
  <style>
#form{
    border: 2px solid rgb(234, 232, 232);
    padding: 0px 20px;
    border-radius: 30px 0 30px 0;
    box-shadow: 10px 10px 10px gray ;
    background: transparent;
}
::placeholder{
font-variant:small-caps; 
font-weight: 500;
}
#button{
    background: #574B90;
    color: white;
    border: none;
}
#button:hover {
    border: 2px solid rgb(207, 207, 207);
    color: #574B90;
    background-color: transparent;
    transition: all 0.5s ease;
}

#input{
    border: 2px solid rgb(207, 207, 207);
    border-radius:10px; 
}


    </style>
    
</head>
<body>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 offset-1 ">
<form action="{{ route('user.update', $data->id) }}" method="post" id="form" >
    @csrf
     <h1 class="text-center mt-4" style="font-variant:small-caps;">
        update form
    </h1>

    <input id="input" type="text" placeholder="Enter Your Name" name="name" class="form-control mt-3" value="{{$data->name}}">
    @error('name')

         <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    @enderror
    <input id="input" type="email" placeholder="Enter Your Email" name="email" class="form-control mt-3" value="{{$data->email}}">
    @error('email')
    <p style="font-variant: small-caps; color:red ; font-weight:500">{{$message}}</p>
        
    @enderror
    <input id="input" type="text" placeholder="Enter Your role" name="role" class="form-control mt-3" value="{{$data->role}}">
    @error('role')
 <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
        
    @enderror
<button id="button" class="btn mt-4 mb-4" style="font-variant: small-caps; font-weight:bold;">update</button>
   
</form>
</div>
</div>

        <div class="col-md-4"></div>
    </div>
    
@endsection