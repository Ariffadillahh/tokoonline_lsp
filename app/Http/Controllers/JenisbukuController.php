<?php

namespace App\Http\Controllers;

use App\Models\jenisbuku;
use Illuminate\Http\Request;

class JenisbukuController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_buku' => 'required|min:3|max:255',
        ]);

        jenisbuku::create($validateData);

        return redirect()->back()->with('succses', 'Buku Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenisbuku  $jenisbuku
     * @return \Illuminate\Http\Response
     */
    public function show(jenisbuku $jenisbuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenisbuku  $jenisbuku
     * @return \Illuminate\Http\Response
     */
    public function edit(jenisbuku $jenisbuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenisbuku  $jenisbuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jenisbuku $jenisbuku)
    {   

        
        $id = $request->id;
        
        jenisbuku::where('id',$id)->update([
            'jenis_buku' => $request->jenis_buku
        ]);

        return redirect()->back()->with('succses', "Berhasil update" );



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenisbuku  $jenisbukujenisbuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        jenisbuku::where("id",$id)->delete();
        return redirect()->back()->with('succses', "Berhasil hapus" );
    }
}
