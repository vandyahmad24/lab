<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKerusakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'alat_id','pic_id','tanggal_temuan','jenis_kerusakan','akibat','faktor','rencana','foto','status_permintaan'
    ];

    protected $table = 'data_kerusakan';
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
    public function pic()
    {
        return $this->belongsTo(Alat::class, 'pic_id');
    }
}
