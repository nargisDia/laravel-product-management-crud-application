<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(Request $request)
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
