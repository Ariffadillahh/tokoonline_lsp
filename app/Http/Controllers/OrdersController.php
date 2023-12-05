<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'dikemas')->get();

        $ordersAntar = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'diantar')->get();

        $ordersSelesai = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'selesai')->get();

        return view('User.Orders.Dikemas', [
            'orders' => $orders,
            'diantar' => $ordersAntar,
            'selesai' => $ordersSelesai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diantar()
    {
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'diantar')->get();

        $selesai = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'selesai')->get();

        $dikemas = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'dikemas')->get();

        return view('User.Orders.Diantar', [
            'orders' => $orders,
            'dikemas' => $dikemas,
            'selesai' => $selesai
        ]);
    }

    public function search(Request $request ) {

        $query = $request->input('q');
        $product = Product::orderBy('id_product', 'DESC')
        ->where('name_product', 'like', '%' . $query . '%')
        ->orWhere('name_brand', 'like', '%' . $query . '%')->get();
        
        return view('User.Search',[
           'product' => $product,
           'q' => $query
        ] );
        
    }

    public function selesai()
    {
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'selesai')->get();

        $dikemas = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'dikemas')->get();
        
        $diantar = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->select('orders.*','products.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.status_orders', '=', 'diantar')->get();

        return view('User.Orders.Selesai', [
            'orders' => $orders,
            'dikemas' => $dikemas,
            'diantar' => $diantar
        ]);
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
            'size' => 'required',
            'alamat' => 'required',
            'qty' => 'required',
        ]);

        $total_harga = $request->qty * $request->harga;
        Orders::create([
            'id_product' => $request->id_product,
            'id_alamat' => $request->alamat,
            'id_user' => auth()->user()->id,
            'qty_orders' => $request->qty,
            'metode_pembayaran' => 'cod',
            'status_orders' => 'dikemas',
            'date_orders' => Carbon::now(),
            'total_harga' => $total_harga,
            'size' => $request->size
        ]);

        return redirect('/orders/dikemas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function detail(Orders $orders , $id)
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat' )
        ->select('orders.*','products.*', 'alamats.*')
        ->where('orders.id_user', '=', auth()->user()->id)
        ->where('orders.id_orders', '=', $id)->first();
        return view('User.Orders.Detail', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Orders $orders)
    {
        Orders::where('id_orders', $request->id)->where('id_user', auth()->user()->id)->update([
            'status_orders' => 'selesai'
        ]);

        return redirect()->back()->with('success', 'Thankyou sudah berbelanja di TokoGue');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
