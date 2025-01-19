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

