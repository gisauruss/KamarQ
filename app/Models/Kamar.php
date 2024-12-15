<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'nama_kamar',
        'tipe_kamar',
        'deskripsi',
        'status',
        'fasilitas',
        'foto_kamar',
        'harga'
    ];

    public function likes(){

        // satu user bisa ngelike banyak produk
        return $this->hasMany(Likes::class);
    }

    public function ratings(){

        // satu user bisa ngelike banyak produk
        return $this->hasMany(Ratings::class);
    }
}
