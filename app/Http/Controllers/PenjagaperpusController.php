<?php

namespace App\Http\Controllers;

use App\Imports\penjagaImport;
use Illuminate\Http\Request;
use App\Models\penjagaperpus;
use App\Exports\penjagaExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PenjagaperpusController extends Controller
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
    public function export()
    {
        return Excel::download(new penjagaExport, 'PenjagaPerpus-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function import(Request  $request)

    {
        // dd($request->file("file"));
        Excel::import(new penjagaImport, $request->file('file'));
        return redirect()->back()->with('succses', 'Buku Berhasil di tambah dengan Excel');
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
            'nama_penjaga' => 'required|min:3|max:255',
            'no_hp' => 'required|min:3|max:255',
        ]);

        penjagaperpus::create($validateData);

        return redirect()->back()->with('succses', 'Buku Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjagaperpus  $penjagaperpus
     * @return \Illuminate\Http\Response
     */
    public function addExcel(penjagaperpus $penjagaperpus)
    {
        return Excel::download(new penjagaperpus, 'penjagaperpus.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjagaperpus  $penjagaperpus
     * @return \Illuminate\Http\Response
     */
    public function edit(penjagaperpus $penjagaperpus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjagaperpus  $penjagaperpus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjagaperpus $penjagaperpus)
    {   
        $id = $request->id;
        penjagaperpus::where('id',$id)->update([
            'nama_penjaga' => $request->nama_penjaga,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->back()->with('succses', "Berhasil update" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjagaperpus  $penjagaperpus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        penjagaperpus::where("id",$id)->delete();
        return redirect()->back()->with('succses', "Berhasil hapus" );
    }


}
