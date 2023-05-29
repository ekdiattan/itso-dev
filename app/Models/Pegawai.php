<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempatLahir',
        'tanggalLahir',
        'noPegawai',
        'unitKerja',
        'golonganPangkat',
        'tmtGolongan',
        'eselon',
        'namaJabatan',   
        'tmtJabatan',   
        'statusPegawai',   
        'tmtPegawai',   
        'masaKerjaTahun',   
        'masaKerjaBulan',   
        'jenisKelamin',   
        'agama',   
        'perkawinan',   
        'pendidikanAwal',   
        'jurusanPendidikanAwal',   
        'pendidikanAkhir',   
        'jurusanPendidikanAkhir',   
        'noAkses',   
        'noNpwp',   
        'nik',   
        'alamatRumah',   
        'telp',   
        'hp',   
        'email',   
        'kedudukanPegawai',  
    ];
}
