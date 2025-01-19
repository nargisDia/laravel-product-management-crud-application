<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function index(Request $request)
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    function show(Request $request, $slug)
    {
        $product = Product::where('product_id', $slug)->first();
        return view('products.show', compact('product'));
    }

    function create(Request $request)
    {
        return view('products.create');
    }

    function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product-name' => 'required|string|max:255',
            'product-price' => 'required|numeric',
            'product-stock' => 'required|numeric',
            'product-desc' => 'required|string',
            'product-image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            $product_id = Str::slug($request->input('product-name'));

            if ( !empty($product_id) ) {
                
                $existingProduct = Product::where('product_id', $product_id)->first();

                if ($existingProduct) {
                    $randomSuffix = Str::random(5);
                    $product_id .= "-$randomSuffix";
                }
            }

           $product = Product::create([
                'product_id' => $product_id,
                'name' => $request->input('product-name'),
                'description' => $request->input('product-desc'),
                'price' => $request->input('product-price'),
                'stock' => $request->input('product-stock'),
                'image' => $imageName,
            ]);

            $product->save();
            return redirect()->route('products.index', $product)->with('success', 'Product created successfully.');
        }


        return redirect()->route('products.create')->with('error', 'Product creation failed.');
    }


    function edit(Request $request, $slug)
    {
        $product = Product::where('product_id', $slug)->first();

        if( !$product ) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        
        return view('products.edit', compact('product'));
    }

    function update(Request $request, $product_id) {
        $product = Product::where('product_id', $product_id)->first();

        if ($product) {
            $request->validate([
                'product-name' => 'required|string|max:255',
                'product-price' => 'required|numeric',
                'product-stock' => 'required|numeric',
                'product-desc' => 'required|string',
                'product-image' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $product->name = $request->input('product-name');
            $product->description = $request->input('product-desc');
            $product->price = $request->input('product-price');
            $product->stock = $request->input('product-stock');

            if($request->hasFile('product-image')) {
                $image = $request->file('product-image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $product->image = $imageName;
            }

            $product->save();
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }


    function destroy(Request $request, $id) {
        $product = Product::whereId($id)->first();

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    function search(Request $request) {
        $search = $request->input('query');
        
        $products = Product::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->get();

        return view('products.partials.product_rows', compact('products'));
    }
}
