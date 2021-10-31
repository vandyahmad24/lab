<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPemeliharaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'alat_id','tanggal_pemeliharaan','pic_id','status_pelaksanaan','tanggal_pengecekan','jenis_pemeliharaan','kondisi_alat'
    ];

    protected $table = 'jadwal_pemeliharaan';
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}
