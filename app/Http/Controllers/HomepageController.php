<?php

namespace App\Http\Controllers;

use App\Models\KritikSaranModel;
use App\Models\PermohonanTranskripNilaiModel;
use App\Models\SuratAktifKuliahModel;
use App\Models\SuratAvailable;
use App\Models\SuratKPModel;
use App\Models\SuratMagangModel;
use App\Models\SuratPengambilanDataModel;
use App\Models\SuratRekomendasiModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Yajra\DataTables\DataTables;

class HomepageController extends Controller
{
    public function index()
    {
        $data = [
            'surat_availables' => collect(SuratAvailable::SURAT_AVAILABLE),
            'surat_templates' => collect(SuratAvailable::TEMPLATE),
            'count_kritik'   => KritikSaranModel::count()
        ];

        return view('homepage.home', $data);
    }

    public function requestSurat($typeId)
    {
        $data = [
            'surat' => collect(SuratAvailable::SURAT_AVAILABLE)->where('id', $typeId)->first(),
            'type' => $typeId,
        ];

        return view('homepage.request', $data);
    }

    public function storeSurat(Request $request)
    {
        if ($request->type == SuratAvailable::SURAT_AKTIF_KULIAH) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            SuratAktifKuliahModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_KERJA_PRAKTIK) {
            $validated = $this->suratKpMagang($request);
            SuratKPModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_PERMOHONAN_MAGANG) {
            $validated = $this->suratKpMagang($request);
            SuratMagangModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_PENGAMBILAN_DATA) {
            $validated = $this->suratPengambilanData($request);
            SuratPengambilanDataModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        if ($request->type == SuratAvailable::TRANSKRIP_NILAI) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            PermohonanTranskripNilaiModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        if ($request->type == SuratAvailable::SURAT_REKOMENDASI) {
            $validated = $this->suratAktifKuliahTranskripRekomendasi($request);
            SuratRekomendasiModel::updateOrCreate([
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'status_surat' => null,
                'no_hp' => $validated['no_hp'],
            ], $validated);
        }

        return response()->json([
            'message' => 'success saved data',
        ], 200);
    }

    protected function suratAktifKuliahTranskripRekomendasi(Request $request)
    {
        return $request->validate([
            'no_hp' => 'required|numeric|digits_between:1,25',
            'email' => 'required|email',
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'keperluan' => 'required',
        ]);
    }

    protected function suratPengambilanData(Request $request)
    {
        return $request->validate([
            'no_hp' => 'required|numeric|digits_between:1,25',
            'email' => 'required|email',
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tujuan_surat' => 'required',
            'alamat_surat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'judul_skripsi' => 'required',
        ]);
    }

    protected function suratKpMagang(Request $request)
    {
        return $request->validate([
            'no_hp' => 'required|numeric|digits_between:1,25',
            'email' => 'required|email',
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tujuan_surat' => 'required',
            'alamat_surat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
    }

    public function cekStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            if ($request->search) {
                // code...
                $suratAktifKuliah = SuratAktifKuliahModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($suratAktifKuliah as $key => $value) {
                    $value['title'] = 'Surat Aktif Kuliah';
                    $value['jenis'] = 'aktif_kuliah';
                    $data[] = $value->toArray();
                }

                $suratKp = SuratKPModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($suratKp as $key => $value) {
                    $value['title'] = 'Surat Kerja Praktik';
                    $value['jenis'] = 'kp';
                    $data[] = $value->toArray();
                }

                $suratMagang = SuratMagangModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($suratMagang as $key => $value) {
                    $value['title'] = 'Surat Magang';
                    $value['jenis'] = 'magang';
                    $data[] = $value->toArray();
                }

                $suratPengambilanData = SuratPengambilanDataModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($suratPengambilanData as $key => $value) {
                    $value['title'] = 'Surat Pengambilan Data';
                    $value['jenis'] = 'pengambilan_data';
                    $data[] = $value->toArray();
                }

                $suratRekomendasi = SuratRekomendasiModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($suratRekomendasi as $key => $value) {
                    $value['title'] = 'Surat Rekomendasi';
                    $value['jenis'] = 'rekomendasi';
                    $data[] = $value->toArray();
                }

                $permohonanTranskripNilai = PermohonanTranskripNilaiModel::where('nim', 'like', '%' . $request->search . '%')->get();
                foreach ($permohonanTranskripNilai as $key => $value) {
                    $value['title'] = 'Permohononan Transkrip Nilai';
                    $value['jenis'] = 'transkrip_nilai';
                    $data[] = $value->toArray();
                }
            }

            $items = collect($data);

            return DataTables::of($items)
                ->editColumn('created_at', function ($items) {
                    return date('M d, Y H:i', strtotime($items['created_at']));
                })
                ->addColumn('status', function ($items) {
                    $status = $items['status_surat'] ? $items['status_surat'] : 'Menunggu di cek';

                    return $status;
                })
                ->addColumn('action', function ($items) {
                    if ($items['status_surat'] == 'Selesai') {
                        $url = Route('downloadSurat', ['jenis_surat' => $items['jenis'], 'id_surat' => $items['id']]);

                        return '
                            <a href="' . $url . '" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mr-2 mb-2">
                                Download
                            </a>
                        ';
                    }

                    return '-';
                })
                ->toJson();
        }

        return view('homepage.cek-status');
    }

    public function kotakSaran(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kritik_saran' => 'required'
        ]);

        KritikSaranModel::create($validated);

        $response = [
            'message' => 'Terima kasih ' . $validated['nama'] . ' telah memberikan saran'
        ];
        return response()->json($response, 201);
    }

    public function downloadSurat($type, $suratId)
    {
        $headers = [
            'Content-type' => 'application/pdf',
        ];

        if ($type === 'aktif_kuliah') {
            $suratAktifKuliah = SuratAktifKuliahModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratAktifKuliah/' . $suratAktifKuliah->nama_surat;

            return response()->download($pathToFile, $suratAktifKuliah->nama_surat, $headers);
        } elseif ($type === 'kp') {
            $suratKp = SuratKPModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratKP/' . $suratKp->nama_surat;

            return response()->download($pathToFile, $suratKp->nama_surat, $headers);
        } elseif ($type === 'magang') {
            $suratMagang = SuratMagangModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratMagang/' . $suratMagang->nama_surat;

            return response()->download($pathToFile, $suratMagang->nama_surat, $headers);
        } elseif ($type === 'pengambilan_data') {
            $suratPengambilanData = SuratPengambilanDataModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratPengambilanData/' . $suratPengambilanData->nama_surat;

            return response()->download($pathToFile, $suratPengambilanData->nama_surat, $headers);
        } elseif ($type === 'transkrip_nilai') {
            $transkripNilai = PermohonanTranskripNilaiModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratTranskripNilai/' . $transkripNilai->nama_surat;

            return response()->download($pathToFile, $transkripNilai->nama_surat, $headers);
        } elseif ($type === 'rekomendasi') {
            $suratRekomendasi = SuratRekomendasiModel::find($suratId);
            $pathToFile = storage_path('app') . '/SuratRekomendasi/' . $suratRekomendasi->nama_surat;

            return response()->download($pathToFile, $suratRekomendasi->nama_surat, $headers);
        }
    }
}
