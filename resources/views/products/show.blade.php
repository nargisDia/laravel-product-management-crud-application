@extends('products.layout.main')

@section('content')

    <div class="card mt-5">
        <h1 class="card-header text-center p-3">Product Details</h1>

        <div class="d-flex justify-content-end align-items-center p-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mb-3 me-2">
                <i class="bi bi-arrow-left-short"></i> Dashboard
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Product Images -->

                <div class="col-md-6 mb-4">
                    @if($product->image)
                    <img src="{{ asset('images/' . basename($product->image)) }}" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                    @else
                    <img src="{{ asset('images/default.svg') }}" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                    @endif
                </div>        

                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $product->name }}</h2>
                    <div class="mb-3">
                        <span class="h4 me-2">$ {{$product->price}}</span>
                    </div>
        
                    <p class="mb-4">
                        {{ $product->description }}
                    </p>
        
                </div>
            </div>
        </div>
    
    </div>

@endsection