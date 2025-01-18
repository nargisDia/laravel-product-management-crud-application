@extends('products.layout.main')

@section('content')

<div class="card mt-5">
    <div>
        <h1 class="card-header text-center p-3">Laravel 11 CRUD Products Management App</h1>
    </div>

    <div class="mb-6 text-center">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-success rounded-lg bg-light" role="alert">
                <span class="font-medium">Success alert!</span> {{ session('success') }}
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
                        <img src="{{ asset('storage/products/' . basename($product->image)) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $product->name }}">
                    </td>
                    @else
                    <td class="p-4">
                        <img src="{{ asset('storage/products/default.svg') }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $product->name }}">
                    </td>
                    @endif

                    <td class="p-4">{{ $product->name }}</td>
                    <td class="p-4">{{ Str::limit($product->description, 40, '...') }}</td>
                    <td class="p-4">{{ $product->price }}</td>
                    <td class="p-4">{{ $product->stock }}</td>
                    <td class="p-4">
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection