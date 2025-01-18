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

    function show(Request $request, Product $product)
    {
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
                    $product_id .= "- $randomSuffix";
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
}
