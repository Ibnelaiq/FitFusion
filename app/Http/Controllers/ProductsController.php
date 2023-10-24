<?php

namespace App\Http\Controllers;

use App\Models\V1\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\V1\ProductStocks;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view("dashboard.products.index", compact("products"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {

        $product = Products::create(
            $request->only([
                "name",
                "description"
            ])
        );

        if($request->hasFile("image")){
            $imagePath = $request->file('image')->storeAs('images/products', $product->id. '.' . $request->file('image')->getClientOriginalExtension() ,'public'); // 'images' is the storage path, adjust as needed
            $product->update(['image'=> $imagePath]);
        }

        ProductStocks::create([
            "products_id" => $product->id,
            "quantity" => $request->input("starting_stock")
        ]);

        return  redirect()->route('products.index')->with('success','Product Added');





    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('dashboard.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        dd($products);
        $products->delete();
        return response()->json(['success'=> 'true']);

    }
}
