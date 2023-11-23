<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjagaperpus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penjaga', 'no_hp'
    ];
}
