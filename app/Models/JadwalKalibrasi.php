<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKalibrasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'alat_id','jenis_kalibrasi','tanggal_kalibrasi','status_kalibrasi','remark','sertifikat'
    ];

    protected $table = 'jadwal_kalibrasi';
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}
