<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'bahan_kode','nama_bahan','alat_id','stok','satuan_id','kode_penyimpanan_id','limit'
    ];

    protected $table = 'bahan';
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    public function KodePenyimpanan()
    {
        return $this->belongsTo(KodePenyimpanan::class, 'kode_penyimpanan_id');
    }
}
