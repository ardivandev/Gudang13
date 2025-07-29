<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';
    protected $fillable = ['id_peminjaman', 'id_barang', 'jumlah'];
    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
