<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapitulasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'unitkerja',
        'masuk',
        'pulang',
        'terlambat',
        'tanggal'
    ];
}
