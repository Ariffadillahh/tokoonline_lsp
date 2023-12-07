<?php

namespace App\Http\Controllers;

use App\Models\boking;
use App\Models\chart_size;
use App\Models\User;
use App\Models\login;
use App\Models\daftarbuku;
use App\Models\jenisbuku;
use App\Models\penjagaperpus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {   
        $chart = chart_size::all();
        return view('Admin.dashboard', [
            'chart' => $chart
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
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Email atau Password anda salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {

        $product = Product::orderBy("id_product", "DESC")->get();
        
        return view(
            "Homepage.index",
            [
                'product' => $product
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function orderan(login $login)
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
        ->select('orders.*', 'products.*', 'alamats.*')
        ->orderBy('orders.id_orders', 'desc')
        ->get();

        return view('Admin.Orders', [
            'order' => $orders
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(login $login)
    {
        Auth::logout();
        return redirect('/');
    }
}
