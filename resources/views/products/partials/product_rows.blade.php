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
            <button class="btn btn-danger btn-sm" id="c-product-delete-btn" data-bs-toggle="modal" data-bs-target="#product-delete-modal" role="button" data-product-id="{{$product->id}}">Delete</button>
        </td>
    </tr>
@endforeach