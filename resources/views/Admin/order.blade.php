@extends('Admin.sidebar')

@section('admin')
    
<div class="container">
    <div class="row">
        <div class="col-md-12  text-center">
            @if (session('success'))
                <div class="alert alert-success">
{{session('success')}}</div>
@endif
  <h1 class="mt-2" style="font-variant: small-caps">All Orders</h1>
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

              <tbody>
@php $grandTotal = 0; @endphp

@foreach($orders as $order)
@php
    $total = $order->price * $order->quentity;
    $grandTotal += $total;
@endphp

<tr>
    <!-- # -->
    <td>{{ $loop->iteration }}</td>

    <!-- Product -->
    <td class="fw-semibold">{{ $order->product_name }}</td>

    <!-- Price -->
    <td>Rs {{ number_format($order->price) }}</td>

    <!-- Quantity -->
    <td>
        <span class=" px-3">
            {{ $order->quentity }}
        </span>
    </td>
      <!-- Image -->
      <td><img src="{{url('storage/product-images/'.$order->product_image)}}" alt="not-found" width="100px"></td>

    <!-- Total -->
    <td class="fw-bold text-success">
        Rs {{$total }}
    </td>

    <!-- Action -->
    <td>
        <button class="btn btn-sm btn-outline-danger">
            Remove
        </button>
    </td>
</tr>
@endforeach
</tbody>

                </table>
            </div>

        </div>

        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">
                Grand Total: 
                <span class="text-success">Rs {{ number_format($grandTotal) }}</span>
            </h5>

        
        </div>
    </div>
    
{{-- @endsection --}}
@endsection


