<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
             <h1 class="text-center mt-4" style="font-variant:small-caps;">
        update form
    </h1>
    
    <div class="row">
<form action="{{route('cate-update',$data->id)}}" method="post" >
    @csrf

    <input type="text" placeholder="Enter Your Name" name="catename" class="form-control mt-3 rounded-3" value="{{$data->name}}">
    @error('name')

         <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    @enderror
    <textarea name="desc" id="" cols="30" class="form-control mt-3" >{{$data->desc}}</textarea>
    @error('email')
    <p style="font-variant: small-caps; color:red ; font-weight:500">{{$message}}</p>
        
    @enderror
    <input type="file"  name="cateimage" class="form-control mt-3 rounded-3">
    <img src="{{url('storage/images/'.$data->image)}}" alt="" height="180px" class="form-control mt-4">
    @error('role')
 <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
        
    @enderror
<button class="btn btn-warning mt-4 rounded-3" style="font-variant: small-caps; font-weight:bold;">update</button>
   
</form>
</div>
</div>

        <div class="col-4"></div>
    </div>
   </div>
</body>
</html>