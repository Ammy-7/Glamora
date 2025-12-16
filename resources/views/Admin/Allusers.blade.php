@extends('Admin.sidebar')

@section('admin')
    
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12  text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif

        
            <h2 class="mt-2">ALL USERS</h2>
            <table class="table table-hover mt-4">
                <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
          @foreach ($users as $user )
          <tbody>
            <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>
<td>        <a href="{{route('edit',$user->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>||
<a href="{{route('delete-user',$user->id)}}" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></a>
</td>         
   </tr>
          </tbody>
              
          @endforeach
            </table>
          
        </div>
    </div>
</div>
    
{{-- @endsection --}}
@endsection

