@extends('products.layout.main')

@section('content')

<div class="card mt-5">
    <div>
        <h1 class="card-header text-center p-3">Laravel 11 CRUD Products Management App</h1>
    </div>

    <div class="col-md-8 offset-md-2 p-3 text-center">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <span class="fs-5">Success alert!</span> {{ session('success') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-danger rounded-lg bg-denger bg-opacity-25" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <span class="font-medium">Danger alert!</span> {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Your content here -->
    </div>

    <div class="d-flex justify-content-between align-items-center my-4 p-4">
        <div class="">
            <a class="btn btn-success btn-md" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>

        <div class="">
            <input type="text" id="search" class="form-control p-3" placeholder="Search products...">
        </div>
    </div>

    <div class="card-body">
        <table class="table table-hover">
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
            <tbody class="table-group-divider">
                @foreach ($products as $product )
                <tr>
                    <th scope="row"><span class="p-4 d-block">{{ $product->id }}</span></th>

                    @if($product->image)
                    <td class="p-4">
                        <img src="{{ asset('images/' . basename($product->image)) }}" class="c-img-thumbnail img-thumbnail mw-30" alt="{{ $product->name }}">
                    </td>
                    @else
                    <td class="p-4">
                        <img src="{{ asset('images/default.svg') }}" class="c-img-thumbnail img-thumbnail" alt="{{ $product->name }}">
                    </td>
                    @endif

                    <td class="p-4">{{ $product->name }}</td>
                    <td class="p-4">{{ Str::limit($product->description, 40, '...') }}</td>
                    <td class="p-4">{{ $product->price }}</td>
                    <td class="p-4">{{ $product->stock }}</td>
                    <td class="p-4">
                        <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#product-delete-modal" role="button">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection