<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\boking;
use App\Models\daftarbuku;
use Illuminate\Http\Request;
use App\Models\penjagaperpus;
use App\Models\rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;

class BokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        return view("Booking.index", [
            "booking" => daftarbuku::find($id),
            "penjaga" => penjagaperpus::all(),

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

        $validate = $request->validate([
            'id_buku' =>  '',
            'nama_peminjam' => 'required|min:3|max:255',
            'tgl_pinjam' => 'required',
            'tgl_balikin' => 'required',
            'nama_penjaga' => 'required',
            'no_hp' => 'required|max:12',
            'id_user' =>   ''
        ]);

        boking::create($validate);
        return redirect("/pinjaman")->with("succses", "Anda berhasil meminjam buku $request->buku");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function show(boking $boking)
    {
        // $rate = rating::all()->where('id_user', Auth()->user()->id)->where('id_boking', );
        $now = carbon::now();
        $bokingxtake = DB::table('daftarbukus')
            ->join('bokings', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('daftarbukus.*', 'bokings.*')
            ->where('bokings.id_user', '=', Auth()->user()->id)
            ->where('bokings.status', '=', "expired")
            ->orderBy('bokings.id_b', 'desc')
            ->take(6)
            ->get();

        $bokingx = DB::table('daftarbukus')
            ->join('bokings', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('daftarbukus.*', 'bokings.*')
            ->where('bokings.id_user', '=', Auth()->user()->id)
            ->where('bokings.status', '=', "expired")
            ->orderBy('bokings.id_b', 'desc')
            ->get();

        $bokingrtake = DB::table('daftarbukus')
            ->join('bokings', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('daftarbukus.*', 'bokings.*')
            ->where('bokings.id_user', '=', Auth()->user()->id)
            ->where('bokings.status', '=', "redy")
            ->orderBy('bokings.id_b', 'desc')
            ->take(6)
            ->get();

        $bokingr = DB::table('daftarbukus')
            ->join('bokings', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('daftarbukus.*', 'bokings.*')
            ->where('bokings.id_user', '=', Auth()->user()->id)
            ->where('bokings.status', '=', "redy")
            ->orderBy('bokings.id_b', 'desc')
            ->get();


            if(auth()->user()->level == "user") {
                return view("Pinjaman.index", [
                    "now" => $now,
                    "bokingr" => $bokingr,
                    "bokingrtake" => $bokingrtake,
                    "bokingx" => $bokingx,
                    "bokingxtake" => $bokingxtake,
                ]);
            }else {
                return redirect('/');
            }

      
    }

    public function rate(Request $request)
    {

        $rate = new rating();
        $rate->id_boking = $request->id_boking;
        $rate->komentar = $request->text;
        $rate->start_rate = $request->rating_2;
        $rate->id_user = Auth()->user()->id;
        $rate->waktu_rate = carbon::now();;
        $rate->status = "ada";
        $rate->save();

        return redirect()->back()->with('succses', 'Your review has been submitted Successfully,');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function edit(boking $boking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boking $boking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request->id;
        rating::where("id_r",$id)->delete();
        return redirect()->back()->with('delet', 'Your review has been Deleted,');
    }
}
