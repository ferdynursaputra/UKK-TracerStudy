<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_konsentrasi_keahlian';
    protected $primaryKey = 'id_konsentrasi_keahlian'; // Ubah primary key default
    public $incrementing = true; // Jika primary key adalah integer dan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_program_keahlian', 'kode_konsentrasi_keahlian', 'konsentrasi_keahlian'
    ];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program_keahlian');
    }
}
