@extends('Admin.sidebar')

@section('admin')
    
<div class="container">
    <div class="row mt-4">
        <div class="col-md-10 offset-2  text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif

        
            <h1 class="mt-5">ALL Product</h1>
    
{{-- @endsection --}}
@endsection

