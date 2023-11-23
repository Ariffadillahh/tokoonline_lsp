<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'nama_peminjam',
        'tgl_pinjam',
        'tgl_balikin',
        'nama_penjaga',
        'no_hp',
        'id_user',
        'status'
    ];
}
