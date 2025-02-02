<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_program_keahlian';
    protected $primaryKey = 'id_program_keahlian'; // Ubah primary key default
    public $incrementing = true; // Jika primary key adalah integer dan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_bidang_keahlian', 'kode_program_keahlian', 'program_keahlian'
    ];


    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian');
    }
}

