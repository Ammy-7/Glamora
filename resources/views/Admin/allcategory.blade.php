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
    <div class="row mt-4">
        <div class="col-md-10 offset-2  text-center">
            @if (session('successfull'))
                <div class="alert alert-success">
{{session('successfull')}}</div>
@endif

        
            <h2 class="mt-4">ALL Categories</h2>
            <table class="table table-hover mt-4">
                <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            </thead>
          @foreach ($cateData as $data )
          <tbody>
            <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->desc}}</td>
        <td><img src="{{url('storage/images/'.$data->image)}}" alt="" width="100px"></td>

<td>       
    
    
    <a href="{{route('edit-cate',$data->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>||
<a href="{{route('delete-cate',$data->id)}}" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></a>
</td>         
   </tr>
          </tbody>
              
          @endforeach
            </table>
          
        </div>
    </div>
</div>
    
    
</body>
</html>
    
@endsection