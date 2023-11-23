<?php

namespace App\Http\Controllers;

use App\Models\daftarbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DaftarbukuController extends Controller
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
        //dd($request);
        $validateData = $request->validate([
            'judul' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'jenis_buku' => 'required',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'buku' => 'mimes:pdf,docx,doc,rtf|max:10000',
        ]);

        $image = $request->file('cover_buku');
        $image->storeAs('public/thumbnail', $image->hashName());

        $buku = $request->file('buku');
        $buku->storeAs('public/buku', $buku->hashName());

        daftarbuku::create([
            'judul' => $request->judul,
            'author' => $request->author,
            'deskripsi' => $request->deskripsi,
            'jenis_buku' => $request->jenis_buku,
            'cover_buku' => $image->hashName(),
            'buku' => $buku->hashName(),
        ]); 
        

        return redirect()->back()->with('succses', 'Buku Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\daftarbuku  $daftarbuku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rate = DB::table('ratings')
            ->join('bokings', 'ratings.id_boking', '=', 'bokings.id_b')
            ->join('daftarbukus', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->select('bokings.*', 'ratings.*', 'daftarbukus.*')
            ->where('daftarbukus.id', '=', $id)
            ->orderBy('ratings.id_r', 'desc')
            ->get();

        $rating = DB::table('ratings')
            ->join('bokings', 'ratings.id_boking', '=', 'bokings.id_b')
            ->join('daftarbukus', 'bokings.id_buku', '=', 'daftarbukus.id')
            ->join('users', 'ratings.id_user', '=', 'users.id')
            ->select('bokings.*', 'ratings.*', 'daftarbukus.*', 'users.*')
            ->where('daftarbukus.id', '=', $id)
            ->orderBy('ratings.id_r', 'desc')
            ->get();

        return view('Lihat.index', [
            'buku' => daftarbuku::find($id),
            'rate' => $rating,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\daftarbuku  $daftarbuku
     * @return \Illuminate\Http\Response
     */
    public function edit(daftarbuku $daftarbuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\daftarbuku  $daftarbuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $id = $request->id;
        $post = daftarbuku::where('id', $id)->first();
        if ($request->hasFile('cover')) {
            Storage::delete('public/thumbnail/'. basename($post->cover_buku));
            $image = $request->file('cover');
            $image->storeAs('public/thumbnail', $image->hashName());
            daftarbuku::where('id', $id)->update([
                'judul' => $request->judul,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
                'jenis_buku' => $request->jenis_buku,
                'cover_buku' => $image->hashName(), // Store the path to the uploaded cover image
                'buku' => $request->buku,
            ]);
        } elseif ($request->hasFile('buku')) {
            // Handle book file upload
            Storage::delete('public/buku/'. basename($post->buku));
            $buku = $request->file('buku');
            $buku->storeAs('public/buku', $buku->hashName());
        
            daftarbuku::where('id', $id)->update([
                'judul' => $request->judul,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
                'jenis_buku' => $request->jenis_buku,
                'buku' => $buku->hashName(), // Store the path to the uploaded book file
            ]);
        } else {
            // No file uploads, update other fields
            daftarbuku::where('id', $id)->update([
                'judul' => $request->judul,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
                'jenis_buku' => $request->jenis_buku,
            ]);
        }
        

      
        return redirect()
        ->back()
        ->with('succses', 'Berhasil Update buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\daftarbuku  $daftarbuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = daftarbuku::where('id', $id)->first();

        // Delete the associated file from storage
        Storage::delete('public/thumbnail/'. basename($post->cover_buku));
        Storage::delete('public/buku/'. basename($post->buku));
        // // Delete the record from the database
        daftarbuku::where('id', $id)->delete();

        return redirect()
            ->back()
            ->with('success', 'Berhasil hapus buku');
    }
}
