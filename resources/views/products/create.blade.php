@extends('products.layout.main')

@section('content')

    <div class="card mt-5">
        <h1 class="card-header text-center p-3">
            Create New Product
        </h1>

        <div class="d-flex justify-content-end align-items-center p-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mb-3 me-2">
                <i class="bi bi-arrow-left-short"></i> Dashboard
            </a>
        </div>

        <div class="col-md-8 offset-md-2 mb-6" >
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
            @endif
        
            @if ($errors->any())
                <div class="" role="alert">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item-danger list-group-item mb-1">
                                <span class="font-medium">Danger alert!</span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Your content here -->
        </div>
        
        <div class="card-body">
            <div class="row">
                <!-- Product Images -->
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="mb-4 col-md-4">
                                <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="product-name" value="{{ old('product-name', $product->name ?? '') }}" class="form-control" id="product-name" aria-describedby="product-name" placeholder="Enter product name">
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="product-price" class="form-label">Product Price <span class="text-danger">*</span></label>
                                <input type="number" name="product-price" value="{{ old('product-price', $product->price ?? '' ) }}" step="0.01" class="form-control" id="product-price" placeholder="Enter product price">
                            </div>

                            <div class="mb-4 col-md-4">
                                <label for="product-stock" class="form-label">Product Stock Amount <span class="text-danger">*</span></label>
                                <input type="number" name="product-stock" value="{{ old('product-stock', $product->stock ?? '') }}" class="form-control" id="product-stock" placeholder="Enter product stock amount">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="mb-4 col-md-12">
                                <label for="product-desc" class="form-label">Product Description <span class="text-danger">*</span></label>
                                <textarea name="product-desc" class="form-control" id="product-desc" placeholder="Enter your product description">{{ old('product-desc', $product->description ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="mb-4 col-md-12">
                                <label for="product-image" class="form-label">Product Image</label>
                                <input type="file" name="product-image" class="form-control" id="product-image">
                            </div>
                        </div>
                    </div>
                        
                    
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                   
                </form>
            </div>
        </div>
    
    </div>

@endsection