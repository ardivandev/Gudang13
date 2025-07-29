<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    // Relasi: Satu Kategori memiliki banyak Barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori');
    }
}