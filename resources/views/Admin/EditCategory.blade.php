@extends('Admin.sidebar')
@section('admin')
<style>
#form{
    border: 2px solid rgb(234, 232, 232);
    padding: 0px 20px;
    /* border-radius: 30px 0 30px 0; */
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
    border: 2px solid rgb(39, 39, 39);
    color: #574B90;
    background-color: transparent;
    transition: all 0.5s ease;
}

#input{
    border: 2px solid rgb(207, 207, 207);
    border-radius:10px; 
}


    </style>
    
   <div class="container mt-5">
        @if (session('successfull'))
        <div class="alert alert-success">
{{session('successfull')}}</div>
    @endif

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 offset-1">
<form id="form" action="{{route('cate-update',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
      <h1 id="hi" class="text-center mt-1" style="font-variant:small-caps;">
        update form
    </h1>

    <input id="input" type="text" placeholder="Enter Your Name" name="catename" class="form-control mt-2" value="{{$data->name}}">
    @error('catename')

         <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    @enderror
    <textarea id="input" name="desc" id="" cols="30" class="form-control mt-2" >{{$data->desc}}</textarea>
    @error('desc')
    <p style="font-variant: small-caps; color:red ; font-weight:500">{{$message}}</p>
        
    @enderror
    <input id="input" type="file"  name="cateimage" class="form-control mt-2">
    <img src="{{url('storage/images/'.$data->image)}}" alt="" height="120px" id="input" class="form-control mt-2">
    @error('cateimage')
 <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
        
    @enderror
<button id="button" class="btn btn-warning mt-4 mb-4 " style="font-variant: small-caps; font-weight:bold;">update</button>
   
</form>
</div>
</div>

        <div class="col-md-4"></div>
    </div>
   </div>
    
@endsection