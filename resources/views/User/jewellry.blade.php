@extends('User.navbar')

{{-- @php
    use Illuminate\Support\Str;
@endphp --}}

@section('navbar')
<div class="container " style="padding-top: 170px">

    <!-- 🔖 Category Heading -->
    <h2 class="fw-bold text-center mb-4" style="font-variant: small-caps">
        {{ $name }} collection
    </h2>

    <div class="row mt-3">

        @forelse ($products as $product)
        <div class="col-md-3 mb-4">

            <div class="card product-card shadow-sm h-100">

                <!-- 🖼 Product Image -->
                <img src="{{ asset('storage/product-images/'.$product->image) }}"
                     class="card-img-top"
                     height="200">

                <div class="card-body d-flex flex-column">

                    <!-- 📌 Name -->
                    <h5 class="fw-bold mb-1">
                        {{ $product->name }}
                    </h5>

                    <!-- 📝 Description -->
                    <p class="text-muted small mb-2">
                        {{ Str::limit($product->desc, 60) }}
                    </p>

                    <!-- ⭐ Rating -->
                    <div class="text-warning mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                    </div>

                    <!-- 💰 Price -->
                    <div class="mb-2">
                        <span class="fw-bold">
                            Rs {{ number_format($product->price) }}
                        </span>

                        @if($product->old_price)
                            <span class="text-muted text-decoration-line-through ms-2">
                                Rs {{ number_format($product->old_price) }}
                            </span>
                        @endif
                    </div>

                    <!-- 📦 Stock -->
                    @if($product->quantity > 0)
                        <span class="badge bg-success mb-3">In Stock</span>
                    @else
                        <span class="badge bg-danger mb-3">Out of Stock</span>
                    @endif

                    <!-- 🛒 Cart -->
                    <div class="mt-auto d-grid ">
                        @if($product->quantity > 0)
                            <a href="{{ route('cart', $product->id) }}"
                               class="btn "style="background: #FF6347; color:#fff;">
                                🛒 Add to Cart
                            </a>
                        @else
                            <button class="btn btn-secondary w-100" disabled>
                                ❌ Out of Stock
                            </button>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        @empty
            <p class="text-center text-danger">
                No products found in {{ $name }}
            </p>
        @endforelse

    </div>
</div>
@endsection
