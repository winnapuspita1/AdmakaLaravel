<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMagangModel extends Model
{
    use HasFactory;

    protected $table = 'surat_magang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'program_studi',
        'tempat_lahir',
        'tanggal_lahir',
        'tujuan_surat',
        'alamat_surat',
        'tanggal_mulai',
        'tanggal_selesai',
        'id_mahasiswa',
    ];
}
