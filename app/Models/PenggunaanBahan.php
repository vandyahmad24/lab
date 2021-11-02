<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanBahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'bahan_id','tanggal_digunakan','jumlah_digunakan'
    ];

    protected $table = 'penggunaan_bahan';
    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
}
