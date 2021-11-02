<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'bahan_id','tanggal_penerimaan','jumlah_diterima'
    ];

    protected $table = 'penerimaan_bahan';
    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
   
}
