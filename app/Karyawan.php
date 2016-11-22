<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat'
    ];
}
