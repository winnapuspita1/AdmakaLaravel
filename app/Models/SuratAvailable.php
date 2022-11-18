<?php

namespace App\Models;

class SuratAvailable
{
    const SURAT_AKTIF_KULIAH = 1;

    const SURAT_KERJA_PRAKTIK = 2;

    const SURAT_PERMOHONAN_MAGANG = 3;

    const SURAT_PENGAMBILAN_DATA = 4;

    const TRANSKRIP_NILAI = 5;

    const SURAT_REKOMENDASI = 6;

    const SURAT_AVAILABLE = [
        [
            'id' => 1,
            'title' => 'Surat Aktif Kuliah',
            'description' => 'Form pelayanan surat aktif kuliah',
            'uri' => '',
        ],
        [
            'id' => 2,
            'title' => 'Surat Permohonan Kerja Praktik (KP)',
            'description' => 'Form pelayanan surat permohonan kerja praktik (KP)',
            'uri' => '',
        ],
        [
            'id' => 3,
            'title' => 'Surat Permohonan Magang',
            'description' => 'Form pelayanan surat permohonan magang',
            'uri' => '',
        ],
        [
            'id' => 4,
            'title' => 'SURAT PERMOHONAN PENGAMBILAN DATA PENELITIAN',
            'description' => 'Form pelayanan surat permohonan pengambilan data penelitian',
            'uri' => '',
        ],
        [
            'id' => 5,
            'title' => 'TRANSKRIP NILAI SEMENTARA',
            'description' => 'Form pelayanan transkrip nilai sementara',
            'uri' => '',
        ],
        [
            'id' => 6,
            'title' => 'SURAT REKOMENDASI',
            'description' => 'Form pelayanan surat rekomendasi',
            'uri' => '',
        ],
    ];

    const TEMPLATE = [
        [
            'id' => 1,
            'name' => 'Surat Persetujuan Sidang Skripsi',
            'file' => 'FORM_AKADEMIK/BO.FT.01_SURAT_PERSETUJUAN_SIDANG_SKRIPSI.docx',
        ],
        [
            'id' => 2,
            'name' => 'Form Permohonan Sidang Skripsi',
            'file' => 'FORM_AKADEMIK/BO.FT.02 FORM PERMOHONAN SIDANG SKRIPSI.docx',
        ],
        [
            'id' => 3,
            'name' => 'Form Permohonan Seminar Proposal Skripsi',
            'file' => 'FORM_AKADEMIK/BO.FT.03 FORM PERMOHONAN SEMINAR PROPOSAL SKRIPSI.docx',
        ],
        [
            'id' => 4,
            'name' => 'Surat Persetujuan Seminar Proposal Skripsi',
            'file' => 'FORM_AKADEMIK/BO.FT.04 SURAT PERSETUJUAN SEMINAR PROPOSAL SKRIPSI.docx',
        ],
        [
            'id' => 5,
            'name' => 'Form Cuti Akademik',
            'file' => 'FORM_AKADEMIK/Borang Pengurusan Mahasiswa Cuti_Pindah.docx',
        ],
        [
            'id' => 6,
            'name' => 'Borang Laporan Permasalahan SIPA',
            'file' => 'FORM_AKADEMIK/Borang Permasalahan SIPA.pdf',
        ],
        [
            'id' => 7,
            'name' => 'Formulir Pengurusan KTM',
            'file' => 'FORM_AKADEMIK/FORMULIR PENGURUSAN KTM.docx',
        ],
        [
            'id' => 8,
            'name' => 'Permohonan Mengikuti MBKM',
            'file' => 'FORM_AKADEMIK/PERMOHONAN MENGIKUTI KEGIATAN MBKM.docx',
        ],
    ];
}
