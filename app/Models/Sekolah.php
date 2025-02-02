<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'tbl_sekolah';
    protected $primaryKey = 'id_sekolah'; // Ubah primary key default
    public $incrementing = true; // Jika primary key adalah integer dan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'npsn', 'nss', 'nama_sekolah', 'alamat', 'no_telp', 'website', 'email'
    ];
}

