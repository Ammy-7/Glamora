@extends('User.navbar')

@section('navbar')
    <div class="container my-5 " style="padding-top: 150px">

        <h2 class="text-center mb-4 fw-bold">🛒 My Cart</h2>

        @if ($orders->count() > 0)
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

                                @foreach ($orders as $order)
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
                                        <td>
                                        <img src="{{url('storage/product-images/'.$order->product_image)}}" alt="not found" width="100px"></td>
                                        <!-- Total -->
                                        <td class="fw-bold text-success">
                                            Rs {{ $total }}
                                        </td>

                                        <!-- Action -->
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger"
                                                href="{{ route('remove_order', $order->id) }}"
                                                onclick=" return confirm('Are you sure you want to remove this order?')">
                                                Remove
                                            </a>
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

                    <a href="{{ route('checkout-order') }}" class="btn btn-success px-4 py-2 rounded-pill">
                        <i class="bi bi-credit-card"></i> Checkout
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center p-4 rounded-4 shadow-sm">
                <h5 class="mb-2">🛒 Cart is Empty</h5>
                <p class="mb-0">Add some products to your cart</p>
            </div>
        @endif

    </div>
@endsection
