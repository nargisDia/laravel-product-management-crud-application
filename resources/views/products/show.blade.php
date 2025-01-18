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
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                </div>
        
                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">Premium Wireless Headphones</h2>
                    <div class="mb-3">
                        <span class="h4 me-2">$349.99</span>
                    </div>
        
                    <p class="mb-4">Experience premium sound quality and industry-leading noise cancellation with these wireless
                        headphones. Perfect for music lovers and frequent travelers.</p>
        
                </div>
            </div>
        </div>
    
    </div>

@endsection