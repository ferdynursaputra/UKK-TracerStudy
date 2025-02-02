<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_admin';  // Tentukan nama tabel yang digunakan
    protected $fillable = ['username', 'password'];  // Kolom yang boleh diisi

    // Jika kolom primary key bukan 'id', sesuaikan di sini
    protected $primaryKey = 'id_admin';

    public $timestamps = false;  // Atur ke true jika menggunakan timestamps

    protected $hidden = [
        'password', 'remember_token',
    ];
}
