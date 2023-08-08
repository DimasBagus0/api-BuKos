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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'product_id', 'user_id')
            ->withTimestamps();
    }
    protected static function boot()
    {
        parent::boot();

        // Event "creating" akan dijalankan sebelum produk disimpan ke database
        static::creating(function ($product) {
            $user = auth()->user(); // Dapatkan pengguna terotentikasi saat ini
            if ($user) {
                $product->user_id = $user->id; // Tetapkan nilai user_id dengan ID pengguna terotentikasi
            }
        });
    }
}
