<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerbaikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'alat_id','pic_id','tanggal_perbaikan','jenis_kerusakan','jenis_perbaikan','vendor','bukti_perbaikan','kondisi_alat'
    ];

    protected $table = 'data_perbaikan';
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
    public function pic()
    {
        return $this->belongsTo(Alat::class, 'pic_id');
    }
}
