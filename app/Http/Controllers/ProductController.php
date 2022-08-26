<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        
        return response()->json($products);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
        Product::create($request->all());
    }

    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);        
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
