@extends('User.navbar')

@section('navbar')

<div class="container mt-5" id="Pcontain">
    <div class="row">

        @foreach ($products as $product)
        <div class="col-md-3 mb-4">

            <div class="card product-card shadow-sm">

                <img src="{{ url('storage/product-images/' . $product->image) }}"
                     class="product-img" height="200px">

                <div class="card-body">

                    <h5 class="fw-bold mb-1">{{ $product->name }}</h5>

                    <p class="text-muted small mb-2">
                        {{ $product->desc }}
                    </p>

                    <!-- ⭐ Rating -->
                    <div class="rating mb-2">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <!-- 💰 Price -->
                    <div class="mb-2">
                        <span class="price">$120</span>
                        <span class="old-price ms-2">$150</span>
                    </div>

                    <!-- 📦 STOCK STATUS -->
                    @if($product->quantity > 0)
                        <span class="badge bg-success mb-3">In Stock</span>
                    @else
                        <span class="badge bg-danger mb-3">Out of Stock</span>
                    @endif

                    <!-- 🛒 ADD TO CART -->
                    <div class="d-grid mt-2">
                        @if($product->quantity > 0)
                            <a href="{{ route('cart', $product->id) }}"
                               class="btn btn-success">
                                🛒 Add to Cart
                            </a>
                        @else
                            <button class="btn btn-secondary" disabled>
                                ❌ Out of Stock
                            </button>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

@endsection
