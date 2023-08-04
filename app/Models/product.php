<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'spesifikasi_kamar',
        'fasilitas_kamar',
        'fasilitas_umum',
        'peraturan_kamar',
        'peraturan_kos',
        'tipe_kamar',
        'alamat_kos',
        'favorite'

    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'product_id', 'user_id')
            ->withTimestamps();
    }
}
