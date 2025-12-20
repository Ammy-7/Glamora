@extends('Admin.sidebar')

@section('admin')
 @if (session('error'))
        <div class="alert alert-danger">
{{session('error')}}</div>
        
    @endif
    <style>
#form{
    border: 2px solid rgb(234, 232, 232);
    padding: 20px;
    border-radius: 30px 0 30px 0;
    box-shadow: 10px 10px 10px gray ;
}
::placeholder{
font-variant:small-caps; 
font-weight: 500;
}
#button{
    background: #574B90;
    color: white;
    border: transparent;
     font-size: 20px;
    font-weight: 500;
}
#button:hover {
    border: 2px solid #000;
    color: #574B90;
    background-color: transparent;
    transition: all 0.5s ease;
}

#input{
    border: 2px solid rgb(207, 207, 207);
    border-radius:10px; 
}


    </style>
  
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
        </div>
        <div class="col-md-6">
            
            <form class="mt-4" action="{{route('add-cate')}}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                  <h1 class="text-center" style="font-variant:small-caps;">add category</h1>
<input id="input" class="form-control mt-4" type="text" placeholder="Enter name" name="catename">
@error('catename')
  <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    
@enderror
<textarea id="input" class="form-control mt-4" name="desc" id="" cols="10" placeholder="description"></textarea>

<input id="input" class="form-control mt-4" type="file"  name="cateimage">
@error('cateimage')
  <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    
@enderror
<button id="button" class="btn mt-4 w-100" style="font-variant:small-caps;font-weight:bold;">submit</button>
</form>
        </div>
        <div class="col-md-3" ></div></div>
    </div>
    
@endsection