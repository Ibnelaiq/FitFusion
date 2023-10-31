<?php

namespace App\Http\Controllers;

use App\Models\V1\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\storeSaleRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\V1\Customer;
use App\Models\V1\ProductStocks;
use Illuminate\Http\Request;

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
                "description",
                "normal_price",
                "sale_price"
            ])
        );

        if($request->hasFile("image")){
            $imagePath = $request->file('image')->storeAs('images/products', $product->id. '.' . $request->file('image')->getClientOriginalExtension() ,'public'); // 'images' is the storage path, adjust as needed
            $product->update(['image_url'=> $imagePath]);
        }

        ProductStocks::create([
            "products_id" => $product->id,
            "quantity" => $request->input("starting_stock"),
            "customer_id" => auth()->user()->id
        ]);

        return  redirect()->route('products.index')->with('success','Product Added');





    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('dashboard.products.show', compact('product'));
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
    public function update(Products $product, UpdateProductsRequest $request)
    {
        $product->update($request->all());

        return redirect()->route('products.show', ["product" => $product])->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json(['success'=> 'true']);

    }

    public function sale(Request $request){
        $searchQuery = $request->input('search');
        $customer = $request->input('customer') ?? 0;

        $products = [];

        if($searchQuery){
           $products =Products::where('name', 'like', "%$searchQuery%")->get();
        }
        else{
            $products = Products::all();
        }


        return view('dashboard.products.sale.search', ['products' => $products, 'customer' => $customer]);

    }

    public function saleCustomer(Request $request, ProductStocks $sale){

        $searchQuery = $request->input('search');
        $customer = [];

        if($searchQuery){
           $customer = Customer::where('name', 'like', "%$searchQuery%")->get();
        }
        else{
            $customer = Customer::all()->take(10);
        }


        return view('dashboard.products.sale.searchCustomer', ['customers' => $customer, 'sale' => $sale]);

    }

    public function createSale(Products $product, Request $request){

        return view('dashboard.products.sale.createSale', ['product' => $product, 'customer' => $request->input("customer") ?? 0]);

    }
    public function storeSale(storeSaleRequest $request, Products $product){


        $sale = ProductStocks::create([
            "products_id" => $product->id,
            "quantity" => $request->input("quantity") * -1,
            "customer_id" => $request->input("customer")
        ]);

        if($request->input("customer") == 0){
            return redirect()->route("products.sale.customer.search", ["sale" => $sale])->with("success","Sale Created Successfully");
        }

        return redirect()->route("products.sale.search")->with("success","Sale Created Successfully");



    }

    public function updateSale(Request $request, ProductStocks $sale){


        $sale->update([
            "customer_id" => $request->input("customer"),
        ]);

        return redirect()->route("products.sale.search")->with("success","Sale Updated Successfully");




    }

}
