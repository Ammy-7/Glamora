@extends('User.navbar')

@section('navbar')
<div class="container my-5 " style="padding-top: 150px">
    <div class="row g-4">

        <!-- Billing Details -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 fw-bold">🧾 Billing Details</h4>

                    <form method="post" action="{{route('place.order')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-3" name="name" placeholder="Your Name">
                                @error('name')
                                    <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control rounded-3" name="phone" placeholder="03xx-xxxxxxx">
                                @error('phone')
                                    <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control rounded-3" placeholder="example@email.com">
                            @error('email')
                                    <p style="color: red">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control rounded-3" rows="3" name="address" placeholder="Street, Area, City"></textarea>
                            @error('address')
                                    <p style="color: red">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Order Notes (Optional)</label>
                            <textarea class="form-control rounded-3" rows="2"></textarea>
                        </div>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">🛒 Order Summary</h4>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <strong>Rs. {{$subtotal}}</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Delivery</span>
                        <strong>Rs. 250</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fs-5 mb-4">
                        <span>Total</span>
                        <strong class="text-success">Rs.{{$total}}</strong>
                    </div>

                    <!-- Payment Method -->
                    <h6 class="fw-bold mb-3">Payment Method</h6>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment" checked>
                
                        <label class="form-check-label">
                            Cash on Delivery
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="radio" name="payment">
                        <label class="form-check-label">
                            JazzCash / EasyPaisa
                        </label>
                    </div>

                    <button type="submit"
                        class="btn btn-dark w-100 py-3 rounded-3 fw-bold">
                        Place Order
                    </button>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
