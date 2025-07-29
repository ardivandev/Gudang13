<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_lengkap', 'nis', 'kelas', 'jurusan'];
    public $timestamps = false;
}
