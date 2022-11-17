<?php

namespace App\Http\Controllers;

use App\Models\PermohonanTranskripNilaiModel;
use Illuminate\Http\Request;
use App\Models\SuratAvailable;
use App\Models\SuratAktifKuliahModel;
use App\Models\SuratKPModel;
use App\Models\SuratMagangModel;
use App\Models\SuratPengambilanDataModel;
use App\Models\SuratRekomendasiModel;

class HomepageController extends Controller
{
    public function index()
    {
        $data = [
            'surat_availables' => collect(SuratAvailable::SURAT_AVAILABLE),
            'surat_templates' => collect(SuratAvailable::TEMPLATE)
        ];

        return view('homepage.home', $data);
    }

    public function requestSurat($typeId)
    {
        $data = [
            'surat' => collect(SuratAvailable::SURAT_AVAILABLE)->where('id', $typeId)->first(),
            'type'  => $typeId
        ];

        return view('homepage.request', $data);
    }

    public function storeSurat(Request $request)
    {
        if ($request->type == SuratAvailable::SURAT_AKTIF_KULIAH) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            SuratAktifKuliahModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_KERJA_PRAKTIK) {
            $validated = $this->suratKpMagang($request);
            SuratKPModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_PERMOHONAN_MAGANG) {
            $validated = $this->suratKpMagang($request);
            SuratMagangModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_PENGAMBILAN_DATA) {
            $validated = $this->suratPengambilanData($request);
            SuratPengambilanDataModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        if ($request->type == SuratAvailable::TRANSKRIP_NILAI) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            PermohonanTranskripNilaiModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_REKOMENDASI) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            SuratRekomendasiModel::updateOrCreate([
                'email' => $validated['email'],
                'nim'   => $validated['nim'],
                'status_surat' => null
            ], $validated);
        }

        return response()->json([
            'message' => 'success saved data'
        ], 200);
    }

    protected function suratAktifKuliahTranskripRekomendasi(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'nim'   => 'required',
            'nama'  => 'required',
            'program_studi' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'keperluan'     => 'required'
        ]);
    }

    protected function suratPengambilanData(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'nim'   => 'required',
            'nama'  => 'required',
            'program_studi' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'tujuan_surat'  => 'required',
            'alamat_surat'  => 'required',
            'tanggal_mulai'   => 'required',
            'tanggal_selesai' => 'required',
            'judul_skripsi'   => 'required'
        ]);
    }

    protected function suratKpMagang(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'nim'   => 'required',
            'nama'  => 'required',
            'program_studi' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'tujuan_surat'  => 'required',
            'alamat_surat'  => 'required',
            'tanggal_mulai'   => 'required',
            'tanggal_selesai' => 'required'
        ]);
    }
}
