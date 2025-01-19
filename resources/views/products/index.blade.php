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
                <th scope="col">
                    <a href="{{ route('products.index', ['sortBy' => 'id', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                        #
                        @if($sortBy == 'id' && $sortOrder == 'asc')
                            <i class="bi bi-arrow-up"></i>
                        @else
                            <i class="bi bi-arrow-down"></i>
                        @endif
                    </a>
                </th>
                <th scope="col">Image</th>
                <th scope="col">
                    <a href="{{ route('products.index', ['sortBy' => 'name', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                        Name
                        @if($sortBy == 'name' && $sortOrder == 'asc')
                            <i class="bi bi-arrow-up"></i>
                        @else
                            <i class="bi bi-arrow-down"></i>
                        @endif
                    </a>
                </th>
                <th scope="col">
                    <a href="{{ route('products.index', ['sortBy' => 'description', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                        Description
                        @if($sortBy == 'description' && $sortOrder == 'asc')
                            <i class="bi bi-arrow-up"></i>
                        @else
                            <i class="bi bi-arrow-down"></i>
                        @endif
                    </a>
                </th>
                <th scope="col">
                    <a href="{{ route('products.index', ['sortBy' => 'price', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                        Price
                        @if($sortBy == 'price' && $sortOrder == 'asc')
                            <i class="bi bi-arrow-up"></i>
                        @else
                            <i class="bi bi-arrow-down"></i>
                        @endif
                    </a>
                </th>
                <th scope="col">
                    <a href="{{ route('products.index', ['sortBy' => 'stock', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                        Stock
                        @if($sortBy == 'stock' && $sortOrder == 'asc')
                            <i class="bi bi-arrow-up"></i>
                        @else
                            <i class="bi bi-arrow-down"></i>
                        @endif
                    </a>
                </th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider c-products-tbody">
                @include('products.partials.product_rows')
            </tbody>
        </table>
        <div> {{ $products->links('pagination::bootstrap-5') }} </div>
    </div>
</div>

@endsection