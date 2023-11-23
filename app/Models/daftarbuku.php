<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarbuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'author',
        'deskripsi',
        'jenis_buku',
        'cover_buku',
        'buku',
    ];
}
