@extends('Admin.sidebar')

@section('admin')
    
<div class="container">
    <div class="row ">
        <div class="col-md-12  text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif

        
             <h1 class="mt-2" style="font-variant: small-caps">All Users</h1>
                <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
<div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-dark">
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
        <<td>
    @if($user->role === 'admin')
        <span class="fw-bold" style="color: green;">
            {{$user->role}}
        </span>
    @else
        {{$user->role}}
    @endif
</td>

<td>        <a style="color: green" href="{{route('edit',$user->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>||
<a style="color: red" href="{{route('delete-user',$user->id)}}" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></a>
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

@endsection

