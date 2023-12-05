<?php

namespace App\Http\Controllers;

use App\Models\chart_size;
use App\Models\SizeProduct;
use Illuminate\Http\Request;

class ChartSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function addSize(Request $request) {

        if(empty($request->input('size'))) {
            return redirect()->back()->with('error', 'Please select at least one size.');
        }
        foreach ($request->input('size') as $stock) {
            $size = new SizeProduct;
            $size->uk_size = $stock;
            $size->id_product = $request->id;
            $size->save();
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chart_size  $chart_size
     * @return \Illuminate\Http\Response
     */
    public function show(chart_size $chart_size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chart_size  $chart_size
     * @return \Illuminate\Http\Response
     */
    public function edit(chart_size $chart_size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chart_size  $chart_size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chart_size $chart_size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chart_size  $chart_size
     * @return \Illuminate\Http\Response
     */
    public function destroy(chart_size $chart_size)
    {
        //
    }
}
