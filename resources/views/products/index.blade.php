@extends('products.layout.main')

@section('content')

<div class="card mt-5">
    <div>
        <h1 class="card-header text-center p-3">Laravel 11 CRUD Products Management App</h1>
    </div>

    @include('products.partials.alerts')

    <div class="d-flex justify-content-between align-items-center p-4">
        <div class="">
            <a class="btn btn-success btn-md" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>

        <div class="">
            <input type="text" id="c-search-product-input" class="form-control p-3" placeholder="Search products...">
        </div>
    </div>

    <div class="card-body">
        <table class="table table-hover" id="c-products-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider c-products-tbody">
                @include('products.partials.product_rows')
            </tbody>
        </table>
    </div>
</div>

@endsection