<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama','kategori_id','merek','tipe','no_seri','software','tahun_perolehan','lokasi_id','kondisi','status_pengunaan','kalibrasi','periode_pemeliharaan','periode_kalibrasi','ik_alat','manual_book','pic_id','komponen_alat','bahan_habis_pakai','foto','alat_kode'
    ];
    protected $table = 'alat';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
