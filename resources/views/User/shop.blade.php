@extends('User.navbar'
)

@section('navbar')




<div class="container mt-5" id="Pcontain">
    <div class="row justify-content-center">
      @foreach ($products as $products )
            <div class="col-md-3">

            <div class="card product-card shadow-sm" id="product-card">
                <img src="{{ url('storage/product-images/' . $products->image) }}" class="product-img" id="product-img">

                <div class="card-body text-center">
                    <h5 class="fw-bold mb-1">{{ $products->name }}</h5>
                    <p class="text-muted small mb-2">
                        {{ $products->desc }}
                    </p>

                    <div class="rating mb-2" id="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       
                    </div>

                    <div class="mb-3">
                        <span class="price" id="price">$120</span>
                        <span class="old-price ms-2" id="old-price">$150</span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="" class="btn btn-outline-dark" id="button">
                            ❤️ Wishlist
                        </a>
                        <a href="{{ route('cart', $products->id) }}" class="btn btn-success " id="button">
                            🛒 Add to Cart
                        </a>
                    </div>
                </div>
            </div>

        </div>
      @endforeach
    </div>
</div> 

{{-- <div class="container " style="margin-top: 180px;">
    <h1 class="text-center" style="font-variant: small-caps;">All Products</h1>
        <div class="row">
            
            @foreach ($products as $products)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/product-images/' . $products->image) }}" class="card-img-top"
                            alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $products->name }}</h5>
                            <p class="card-text">{{ $products->desc }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="{{ route('cart', $products->id) }}" class="btn btn-primary">add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    
@endsection