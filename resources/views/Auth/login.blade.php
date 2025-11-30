@if (session('success'))
<div class="alert alert-success">
{{session('success')}}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
{{session('error')}}</div>
@endif
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
        login form
    </h1>
    <div class="row">
<form action="{{route('l_Data')}}" method="post" >
    @csrf

    


    <input type="email" placeholder="Enter Your Email" name="email" class="form-control mt-3 rounded-3" value="{{old('email')}}">
    @error('email')
     <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    
        
    @enderror
    <input type="password" placeholder="Enter Your Password" name="password" class="form-control mt-3 rounded-3" value="{{old('password')}}">
    @error('password')
 <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
        
    @enderror
<button class="btn btn-success mt-4 rounded-3" style="font-variant: small-caps; font-weight:bold;">login</button>
   
</form>
</div>
</div>

        <div class="col-4"></div>
    </div>
   </div>
</body>
</html>