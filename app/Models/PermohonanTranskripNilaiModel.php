<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanTranskripNilaiModel extends Model
{
    use HasFactory;

    protected $table = 'permohonan_transkrip_nilai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nim',
        'program_studi',
        'tempat_lahir',
        'tanggal_lahir',
        'keperluan',
        'id_mahasiswa',
    ];
}
