@extends('User.navbar'
)

@section('navbar')

<div class="container " style="margin-top: 180px;">
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
    </div>
    
@endsection