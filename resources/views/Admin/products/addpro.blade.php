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
<style>
  #form{
    border: 2px solid rgb(234, 232, 232);
    padding: 0px 20px;
    border-radius: 30px;
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

<body>
    @if (session('error'))
        <div class="alert alert-danger">
{{session('error')}}</div>
        
    @endif
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
        </div>
        <div class="col-md-8 offset-1 ">
  <form id="form" action="{{route('insert-pro')}}" method="post" enctype="multipart/form-data">
    @csrf

    <h2 class="text-center mt-3">Add Product</h2>

    <div class="container mt-2">
        <div class="row">

            <!-- LEFT COLUMN -->
            <div class="col-md-6">

                <div class="mt-2">
                    <label>Product Name</label>
                    <input id="input" class="form-control" type="text" name="pro_name" placeholder="Enter name">
                    @error('pro_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <textarea id="input" class="form-control" name="desc" rows="4" placeholder="Description"></textarea>
                </div>

                <div class="mt-2">
                    <label>Product Image</label>
                    <input id="input" class="form-control" type="file" name="pro_image">
                    @error('pro_image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-md-6">


                <div class="mt-2">
                    <label>Price</label>
                    <input id="input" class="form-control" type="text" name="price" placeholder="Enter price">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label>Quantity</label>
                    <input id="input" class="form-control" type="number" name="quantity" placeholder="Enter quantity">
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label>Category</label>
                    <select id="input" class="form-control" name="category_id">
                      
                        @foreach ($category as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div>

        <div class="text-center mt-3">
            <button id="button" class="btn mb-4">Submit</button>
        </div>
    </div>

</form>

        </div>
        <div class="col-md-2" ></div></div>
    </div>
</body>
</html>
  
@endsection