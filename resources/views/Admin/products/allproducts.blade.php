@extends('Admin.sidebar')

@section('admin')
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
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif

        
             <h1 class="mt-2" style="font-variant: small-caps">All Products</h1>
                 <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
<div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
                <th>quantity</th>
                <th>Category</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            </thead>
          @foreach ( $product_data as $data)
          <tbody>
            <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->desc}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->category->name}}</td>
        <td><img src="{{ Storage::url('product-images/'.$data->image) }}" width="100">
</td>

<td>       
    
    
    <a style="color: green" href="{{route('edit-pro',$data->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>||
<a style="color: red" href="{{route('delete-pro',$data->id)}}" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa-solid fa-trash"></i></a>
</td>         
   </tr>
          </tbody>
              
          @endforeach
            </table>
          
        </div>
    </div>
</div>
      </div>
    </div>
</div>
    
</body>
</html>
    
@endsection