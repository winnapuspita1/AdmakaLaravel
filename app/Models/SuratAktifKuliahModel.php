<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratAktifKuliahModel extends Model
{
    use HasFactory;

    protected $table = 'surat_aktif_kuliah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'nim',
        'program_studi',
        'tempat_lahir',
        'tanggal_lahir',
        'keperluan',
        'id_mahasiswa',
    ];
}
