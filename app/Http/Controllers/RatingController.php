<?php

namespace App\Http\Controllers;

use App\Models\boking;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $boking = DB::table("bokings")
            ->join("daftarbukus", "bokings.id_buku", "=", "daftarbukus.id")
            ->select("bokings.*", "daftarbukus.*")
            ->where("bokings.id_user", "=", Auth()->user()->id)
            ->where("bokings.id_b", "=", $id)
            ->get();

        $rate = DB::table('ratings')
            ->join('bokings', 'ratings.id_boking', '=', 'bokings.id_b')
            ->join('daftarbukus', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('bokings.*', 'ratings.*', 'daftarbukus.*')
            ->where('ratings.id_boking', '=', $id)
            ->where('ratings.id_user', '=', Auth()->user()->id)
            ->get();

        return view("Rating.index", [
            "boking" => $boking,
            "rate" => $rate
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(rating $rating)
    {
        //
    }
}
