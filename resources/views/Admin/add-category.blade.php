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
    @if (session('error'))
        <div class="alert alert-danger">
{{session('error')}}</div>
        
    @endif
    <h1 class="text-center mt-4" style="font-variant:small-caps;">add category</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
        </div>
        <div class="col-4">
            <form action="{{route('add-cate')}}" method="post" enctype="multipart/form-data">
                @csrf
<input class="form-control mt-4" type="text" placeholder="Enter name" name="catename">
@error('catename')
  <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    
@enderror
<textarea class="form-control mt-4" name="desc" id="" cols="10" placeholder="description"></textarea>

<input class="form-control mt-4" type="file"  name="cateimage">
@error('cateimage')
  <p style="font-variant: small-caps; color:red; font-weight:500">{{$message}}</p>
    
@enderror
<button class="btn btn-warning mt-4" style="font-variant:small-caps;font-weight:bold;">submit</button>
</form>
        </div>
        <div class="col-4" ></div></div>
    </div>
</body>
</html>