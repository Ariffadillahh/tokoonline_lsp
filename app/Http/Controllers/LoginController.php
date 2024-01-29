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

    public function settings()
    {
        return view('User.Settings');
    }

    public function users()
    {
        $user = User::all();   
        return view('Admin.Users', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {   
        $chart = chart_size::orderBy('uk_chart')->get();

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

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->level == 'admin' || $user->level == 'superadmin') {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
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

        $product = Product::inRandomOrder()->take(20)->get();

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
    public function orderan()
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
        ->select('orders.*', 'products.*', 'alamats.*')
        ->orderBy('orders.id_orders', 'desc')
        ->where('orders.status_orders', '=', 'dikemas')
        ->get();

        return view('Admin.Orders', [
            'order' => $orders
        ]);
    }

    public function orderanDiantar()
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
        ->select('orders.*', 'products.*', 'alamats.*')
        ->orderBy('orders.id_orders', 'desc')
        ->where('orders.status_orders', '=', 'diantar')
        ->get();

        return view('Admin.OrderanDiantar', [
            'order' => $orders
        ]);
    }

    public function orderanSelesai()
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
        ->select('orders.*', 'products.*', 'alamats.*')
        ->orderBy('orders.id_orders', 'desc')
        ->where('orders.status_orders', '=', 'selesai')
        ->get();

        return view('Admin.OrderanSelesai', [
            'order' => $orders
        ]);
    }

    public function orderanDetail($id)
    {   
        $orders = DB::table('orders')
        ->join('products', 'orders.id_product', '=', 'products.id_product')
        ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat' )
        ->select('orders.*','products.*', 'alamats.*')
        ->where('orders.id_orders', '=', $id)->first();
    
        return view('Admin.DetailOrder', [
            'item' => $orders
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
