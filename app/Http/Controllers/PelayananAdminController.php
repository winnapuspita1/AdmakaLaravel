<?php

namespace App\Http\Controllers;

use App\Models\KritikSaranModel;
use App\Models\PermohonanTranskripNilaiModel;
use App\Models\SuratAktifKuliahModel;
use App\Models\SuratKPModel;
use App\Models\SuratMagangModel;
use App\Models\SuratPengambilanDataModel;
use App\Models\SuratRekomendasiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelayananAdminController extends Controller
{
    public function DashboardAdmin()
    {
        if (auth()->user()->role === 'mahasiswa'){
            return view('mahasiswa.dashboard');
        }

        $akun_mhs = User::where('role','mahasiswa')->count();

        $belum = 0 + PermohonanTranskripNilaiModel::where('status_surat', null)->count() +
        SuratAktifKuliahModel::where('status_surat', null)->count() +
        SuratKPModel::where('status_surat', null)->count() +
        SuratMagangModel::where('status_surat', null)->count() +
        SuratPengambilanDataModel::where('status_surat', null)->count() +
        SuratRekomendasiModel::where('status_surat', null)->count();

        $proses = 0 + PermohonanTranskripNilaiModel::where('status_surat', 'Proses Pengerjaan')->count() +
        SuratAktifKuliahModel::where('status_surat', 'Proses Pengerjaan')->count() +
        SuratKPModel::where('status_surat', 'Proses Pengerjaan')->count() +
        SuratMagangModel::where('status_surat', 'Proses Pengerjaan')->count() +
        SuratPengambilanDataModel::where('status_surat', 'Proses Pengerjaan')->count() +
        SuratRekomendasiModel::where('status_surat', 'Proses Pengerjaan')->count();

        $selesai = 0 + PermohonanTranskripNilaiModel::where('status_surat', 'Selesai')->count() +
        SuratAktifKuliahModel::where('status_surat', 'Selesai')->count() +
        SuratKPModel::where('status_surat', 'Selesai')->count() +
        SuratMagangModel::where('status_surat', 'Selesai')->count() +
        SuratPengambilanDataModel::where('status_surat', 'Selesai')->count() +
        SuratRekomendasiModel::where('status_surat', 'Selesai')->count();

        $data = [
            'akun_mhs' => $akun_mhs,
            'total_belum_proses' => $belum,
            'total_proses' => $proses,
            'total_selesai' => $selesai
        ];
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin') {
            return view('admin.dashboard', $data);
        } 
        return url('/login');
    }

    public function SuratAktifKuliah()
    {
        $data = [
            'data' => SuratAktifKuliahModel::get(),
            'number' => 0,
        ];
        return view('admin/aktivkuliah', $data);
    }

    public function DetailSuratAktif($id, $edit = false)
    {
        $data = [
            'data' => SuratAktifKuliahModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailAktifKuliah', $data);
    }

    public function SaveSuratAktif(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_aktif_kuliah_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratAktifKuliah',
                $filename,
                'local'
            );
            SuratAktifKuliahModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
        
    }

    public function SuratKP()
    {
        $data = [
            'data' => SuratKPModel::get(),
            'number' => 0,
        ];
        return view('admin/permohonankp', $data);
    }

    public function DetailSuratKP($id, $edit = false)
    {
        $data = [
            'data' => SuratKPModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailSuratKP', $data);
    }

    public function SaveSuratKP(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_kp_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratKP',
                $filename,
                'local'
            );
            SuratKPModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
    }

    public function SuratMagang()
    {
        $data = [
            'data' => SuratMagangModel::get(),
            'number' => 0,
        ];
        return view('admin/permohonanmagang', $data);
    }

    public function DetailSuratMagang($id, $edit = false)
    {
        $data = [
            'data' => SuratMagangModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailSuratMagang', $data);
    }

    public function SaveSuratMagang(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_magang_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratMagang',
                $filename,
                'local'
            );
            SuratMagangModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
    }

    public function SuratPengambilanData()
    {
        $data = [
            'data' => SuratPengambilanDataModel::get(),
            'number' => 0,
        ];
        return view('admin/pengambilandata', $data);
    }

    public function DetailSuratPengambilanData($id, $edit = false)
    {
        $data = [
            'data' => SuratPengambilanDataModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailSuratPengambilanData', $data);
    }

    public function SaveSuratPengambilanData(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_pengambilan_data_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratPengambilanData',
                $filename,
                'local'
            );
            SuratPengambilanDataModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
    }

    public function SuratTranskripNilai()
    {
        $data = [
            'data' => PermohonanTranskripNilaiModel::get(),
            'number' => 0,
        ];
        return view('admin/transkripnilai', $data);
    }

    public function DetailSuratTranskripNilai($id, $edit = false)
    {
        $data = [
            'data' => PermohonanTranskripNilaiModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailSuratTranskripNilai', $data);
    }

    public function SaveSuratTranskripNilai(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_transkrip_nilai_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratTranskripNilai',
                $filename,
                'local'
            );
            PermohonanTranskripNilaiModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
    }

    public function SuratRekomendasi()
    {
        $data = [
            'data' => SuratRekomendasiModel::get(),
            'number' => 0,
        ];
        return view('admin/suratrekomendasi', $data);
    }

    public function DetailSuratRekomendasi($id, $edit = false)
    {
        $data = [
            'data' => SuratRekomendasiModel::where('id', $id)->get(),
            'edit' => $edit
        ];
        return view('admin/detailSuratRekomendasi', $data);
    }

    public function SaveSuratRekomendasi(Request $request)
    {
        if (! empty($request->dokumen))
        {
            $extension = $request->dokumen->getClientOriginalExtension();
            if ($extension !== 'pdf') {
                return back()->with('failed', 'Silahkan Upload File PDF');
            }
            $date = date('Y-m-d');
            $filename = 'surat_rekomendasi_'.$request->nim.'_'.$date.'.'.$extension;
            $path = $request->file('dokumen')->storeAs(
                'SuratRekomendasi',
                $filename,
                'local'
            );
            SuratRekomendasiModel::where('id', $request->id)->update([
                'nama_surat' => $filename
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }
        return back()->with('failed','Gagal Upload Data!');
    }

    public function StatusSurat($jenis_surat, $id, $status_surat)
    {
        if ($jenis_surat === "aktif_kuliah") {
            if ($status_surat === 'Selesai') {
                $surat = SuratAktifKuliahModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratAktifKuliahModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } elseif ($jenis_surat === "kp") {
            if ($status_surat === 'Selesai') {
                $surat = SuratKPModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratKPModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } elseif ($jenis_surat === "magang") {
            if ($status_surat === 'Selesai') {
                $surat = SuratMagangModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratMagangModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } elseif ($jenis_surat === "pengambilan_data") {
            if ($status_surat === 'Selesai') {
                $surat = SuratPengambilanDataModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratPengambilanDataModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } elseif ($jenis_surat === "transkrip_nilai") {
            if ($status_surat === 'Selesai') {
                $surat = PermohonanTranskripNilaiModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            PermohonanTranskripNilaiModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } elseif ($jenis_surat === "rekomendasi") {
            if ($status_surat === 'Selesai') {
                $surat = SuratRekomendasiModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratRekomendasiModel::where('id', $id)->update([
                'status_surat' => $status_surat
            ]);
        } else {
            return back()->with('failed', 'Gagal Update Data!');
        }

        return back()->with('success', 'Berhasil Update Data!');
    }

    public function HapusSurat($jenis_surat, $id)
    {
        if ($jenis_surat === "aktif_kuliah") {
            SuratAktifKuliahModel::where('id', $id)->delete();
        } elseif ($jenis_surat === "kp") {
            SuratKPModel::where('id', $id)->delete();
        } elseif ($jenis_surat === "magang") {
            SuratMagangModel::where('id', $id)->delete();
        } elseif ($jenis_surat === "pengambilan_data") {
            SuratPengambilanDataModel::where('id', $id)->delete();
        } elseif ($jenis_surat === "transkrip_nilai") {
            PermohonanTranskripNilaiModel::where('id', $id)->delete();
        } elseif ($jenis_surat === "rekomendasi") {
            SuratRekomendasiModel::where('id', $id)->delete();
        } else {
            return back()->with('failed', 'Gagal Update Data!');
        }

        return back()->with('success', 'Berhasil Update Data!');
    }

    public function KritikSaran()
    {
        $data = [
            'data' => KritikSaranModel::get(),
            'number' => 0
        ];

        return view('admin.kritiksaran', $data);
    }

    public function DeleteKritikSaran($id)
    {
        KritikSaranModel::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Data!');
    }

    public function DraftAktifKuliah()
    {
        $data = [
            'surat' => SuratAktifKuliahModel::get(),
            'num' => 0
        ];
        return view('admin/draftaktifkuliah', $data);
    }

    public function DraftKP()
    {
        $data = [
            'surat' => SuratKPModel::get(),
            'num' => 0
        ];
        return view('admin/draftpermohonankp', $data);
    }

    public function DraftMagang()
    {
        $data = [
            'surat' => SuratMagangModel::get(),
            'num' => 0
        ];
        return view('admin/draftpermohonanmagang', $data);
    }
    public function DraftPengambilanData()
    {
        $data = [
            'surat' => SuratPengambilanDataModel::get(),
            'num' => 0
        ];
        return view('admin/draftpengambilandata', $data);
    }
    public function DraftRekomendasi()
    {
        $data = [
            'surat' => SuratRekomendasiModel::get(),
            'num' => 0
        ];
        return view('admin/draftsuratrekomendasi', $data);
    }
    public function DraftTranskripNilai()
    {
        $data = [
            'surat' => PermohonanTranskripNilaiModel::get(),
            'num' => 0
        ];
        return view('admin/drafttranskripnilai', $data);
    }

    public function DraftSurat($jenis_surat, $nama_surat)
    {
        $headers = [
            'Content-type' => 'application/pdf',
        ];

        if ($jenis_surat === "aktif_kuliah") {
            $pathToFile = storage_path('app').'/SuratAktifKuliah/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === "kp") {
            $pathToFile = storage_path('app').'/SuratKP/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === "magang") {
            $pathToFile = storage_path('app').'/SuratMagang/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === "pengambilan_data") {
            $pathToFile = storage_path('app').'/SuratPengambilanData/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === "transkrip_nilai") {
            $pathToFile = storage_path('app').'/SuratTranskripNilai/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === "rekomendasi") {
            $pathToFile = storage_path('app').'/SuratRekomendasi/'. $nama_surat;
            return response()->file($pathToFile, $headers);
        } 
        else {
            return back()->with('failed', 'Gagal Update Data!');
        }

        return back()->with('success', 'Berhasil Update Data!');
    }

    public function ManajemenAkun()
    {
        $data = [

            'data' => User::get(),
            'number' => 0

        ];

        return view('super_admin.manajemen_akun', $data);
    }

    public function HapusAkun($id)
    {
        User::where('id', $id)->delete();
        return back()->with('success', 'Berhasil Hapus Akun!');
    }

    public function PreviewDraftSurat($jenis_surat, $id_permohonan)
    {
        

        if ($jenis_surat === "aktif_kuliah") {
            $surat = SuratAktifKuliahModel::where('id', $id_permohonan)->get();
           
            if(count($surat) === 0)
            {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $no_hp = User::select('nomor_hp')->where('id', $surat[0]->id_mahasiswa)->get();
            $data = [
                'data' => $surat,
                'no_hp' => $no_hp[0]->nomor_hp,
                'title' => 'Draft Surat Aktif Kuliah',
            ];
            return view('admin.previewDraftAktifKuliah', $data);
        } elseif ($jenis_surat === "kp") {
            $surat = SuratKPModel::where('id', $id_permohonan)->get();
           
            if(count($surat) === 0)
            {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $no_hp = User::select('nomor_hp')->where('id', $surat[0]->id_mahasiswa)->get();
            $data = [
                'data' => $surat,
                'no_hp' => $no_hp[0]->nomor_hp,
                'title' => 'Draft Surat Praktik Kerja',
            ];
            return view('admin.previewDraftKP', $data);
        } elseif ($jenis_surat === "magang") {
            $surat = SuratMagangModel::where('id', $id_permohonan)->get();
           
            if(count($surat) === 0)
            {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $no_hp = User::select('nomor_hp')->where('id', $surat[0]->id_mahasiswa)->get();
            $data = [
                'data' => $surat,
                'no_hp' => $no_hp[0]->nomor_hp,
                'title' => 'Draft Surat Magang',
            ];
            return view('admin.previewDraftMagang', $data);
        } elseif ($jenis_surat === "pengambilan_data") {
            
        } elseif ($jenis_surat === "transkrip_nilai") {
            
        } elseif ($jenis_surat === "rekomendasi") {
            
        } 
        
        return back()->with('failed', 'Gagal Mengambil Data!');
        
    }
    
}
