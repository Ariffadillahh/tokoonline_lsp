<?php

namespace App\Http\Controllers;

use App\Models\boking;
use App\Models\User;
use App\Models\login;
use App\Models\daftarbuku;
use App\Models\jenisbuku;
use App\Models\penjagaperpus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $daftarBuku = daftarbuku::orderBy('id', 'DESC');

        if (request('search')) {
            $daftarBuku->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_buku', 'like', '%' . request('search') . '%');;
        }

        return view(
            "Dashboard.index",
            [
                'daftarbuku' => $daftarBuku->get()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(login $login)
    {
        //
    }

    public function admin()
    {
        if(auth()->user()->level == 'admin') {
            return view('Admin.index', [
                'user' => User::where("level", "admin"),
                'boking' => boking::where("status", "redy"),
                'alltransaksi' => boking::all(),
                'buku' => daftarbuku::all(),
                'jenis' => jenisbuku::orderBy("id", "desc")->get(),
            ]);
        }else{
            return redirect('/');
        }
        
    }

    public function penjaga()
    {
        if(auth()->user()->level == 'admin') {
            return view('Admin.penjagaperpus', [
                'penjaga'=> penjagaperpus::orderBy("id", "desc")->get()
            ]);
        }else{
            return redirect('/');
        }
       
    }

    public function pinjam()
    {
        

        if(auth()->user()->level == 'admin') {
            return view('Admin.pinjam', [
                'boking' => boking::where('status','redy')->get()
            ]);
        }else{
            return redirect('/');
        }
    }

    public function user()
    {
       

        if(auth()->user()->level == 'admin') {
            return view('Admin.user', [
                'user' => User::where('level', 'user')->get()
            ]);
        }else{
            return redirect('/');
        }
    }

    

    public function book()
    {
      

        if(auth()->user()->level == 'admin') {
            return view('Admin.books', [
                'buku' => daftarbuku::orderBy("id", "desc")->get(),
                'jenisbuku' => jenisbuku::all()
            ]);
        }else{
            return redirect('/');
        }
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
