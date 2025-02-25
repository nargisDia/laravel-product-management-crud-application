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

        @include('products.partials.alerts')
        
        <div class="card-body">
            <div class="row">
                <!-- Product Images -->
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('products.partials.form')
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    
    </div>

@endsection