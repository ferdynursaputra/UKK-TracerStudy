<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\TracerKerja;

class Alumni extends Authenticatable
{
    use HasFactory;


    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni'; // Ubah primary key default
    public $incrementing = true; // Jika primary key adalah integer dan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_tahun_lulus',
        'id_konsentrasi_keahlian',
        'id_status_alumni',
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'akun_fb',
        'akun_ig',
        'akun_tiktok',
        'email',
        'password',
        'status_login'
    ];

    public function tahunLulus()
    {
        return $this->belongsTo(TahunLulus::class, 'id_tahun_lulus');
    }

    public function konsentrasiKeahlian()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi_keahlian');
    }

    public function statusAlumni()
    {
        return $this->belongsTo(StatusAlumni::class, 'id_status_alumni');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'id_alumni', 'id_alumni');
    }

    public function tracerKuliah()
    {
        return $this->hasOne(TracerKuliah::class, 'id_alumni', 'id_alumni');
    }
    public function tracerKerja()
    {
        return $this->hasOne(TracerKerja::class, 'id_alumni', 'id_alumni');
    }


    protected $hidden = ['password', 'remember_token'];
}


