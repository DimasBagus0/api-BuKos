<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;


    protected $fillable =[
        'foto_kos',
        'foto_pemilik',
        'nama_pemilik',
        'nama_kos',
        'lokasi_kos',
        'harga_kos',

    ];
}
