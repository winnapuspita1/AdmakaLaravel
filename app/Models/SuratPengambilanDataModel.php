<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengambilanDataModel extends Model
{
    use HasFactory;

    protected $table = 'surat_pengambilan_data';

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
        'tujuan_surat' ,
        'alamat_surat' ,
        'tanggal_mulai' ,
        'tanggal_selesai' ,
        'judul_skripsi'
    ];
}
