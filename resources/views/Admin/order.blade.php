@extends('Admin.sidebar')

@section('admin')
    
<div class="container">
    <div class="row mt-4">
        <div class="col-md-10 offset-2  text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif

        
        <div class="container mt-5">
    <h2 class="mb-4">All Orders</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>User</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
         @foreach ($orders as $order )
          <tbody>
            <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->user_name}}</td>
        <td>{{$order->quantity}}</td>
        <td><img src="{{url('storage/images/'.$data->image)}}" alt="no image" width="100"></td>

<td>       
    
    
    <a href="{{route('edit-cate',$data->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>||
<a href="{{route('delete-cate',$data->id)}}" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></a>
</td>         
   </tr>
          </tbody>
              
          @endforeach

      
    </table>

</div>
    
{{-- @endsection --}}
@endsection


