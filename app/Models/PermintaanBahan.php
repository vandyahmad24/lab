<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'satuan','kebutuhan','merek','nama'
    ];

    protected $table = 'permintaan_bahans';
}
