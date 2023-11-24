<?php

namespace App\Http\Controllers;

use App\Models\chart_size;
use App\Models\Product;
use App\Models\SizeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $chart = chart_size::all();
        return view('Add', [
            'chart' => $chart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         $request->validate([
            'name_product' => 'required',
            'desc_product' => 'required',
            'stock_product' => 'required',
            'name_brand' => 'required',
            'images' => 'required',
            'product_status' => 'required',
            'size' => 'required'
        ]);

        $image = $request->file('images');
        $image->storeAs('public/product_images', $image->hashName());

        $pro = new Product;
        $pro->name_product = $request->name_product;
        $pro->desc_product = $request->desc_product;
        $pro->stock_product = $request->stock_product;
        $pro->name_brand = $request->name_brand;
        $pro->image_product =  $request->file('images')->hashName();
        $pro->product_status = $request->product_status;
        $pro->save();

        foreach ($request->input('size') as $stock) {
            $size = new SizeProduct;
            $size->uk_size = $stock;
            $size->id_product = $pro->id;
            $size->save();
        }

        return redirect()->back();
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
