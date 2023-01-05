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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use IntlDateFormatter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpWord\TemplateProcessor;

class PelayananAdminController extends Controller
{
    public function DashboardAdmin()
    {
        if (auth()->user()->role === 'mahasiswa') {
            return view('mahasiswa.dashboard');
        }

        $akun_mhs = User::where('role', 'mahasiswa')->count();

        $belum = 0 + PermohonanTranskripNilaiModel::where('status_surat', null)->count() +
        SuratAktifKuliahModel::whereNull('status_surat')->count() +
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
            'total_selesai' => $selesai,
        ];
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin') {
            return view('admin.dashboard', $data);
        } elseif (auth()->user()->role === 'dekan') {
            return redirect('/cek-status-surat');
        }

        return back();
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
            'edit' => $edit,
        ];

        return view('admin/detailAktifKuliah', $data);
    }

    public function SaveSuratAktif(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratAktifKuliahModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratAktifKuliahModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data! Pastikan File Surat dan Nomor Surat Terisi!');
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
            'edit' => $edit,
        ];

        return view('admin.detailSuratKp', $data);
    }

    public function SaveSuratKP(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratKPModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratKPModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data! Pastikan File Surat dan Nomor Surat Terisi!');
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
            'edit' => $edit,
        ];

        return view('admin/detailSuratMagang', $data);
    }

    public function SaveSuratMagang(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratMagangModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratMagangModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data! Pastikan File Surat dan Nomor Surat Terisi!');
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
            'edit' => $edit,
        ];

        return view('admin/detailSuratPengambilanData', $data);
    }

    public function SaveSuratPengambilanData(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratPengambilanDataModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratPengambilanDataModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data! Pastikan File Surat dan Nomor Surat Terisi!');
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
            'edit' => $edit,
        ];

        return view('admin/detailSuratTranskripNilai', $data);
    }

    public function SaveSuratTranskripNilai(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            PermohonanTranskripNilaiModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            PermohonanTranskripNilaiModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data! Pastikan File Surat dan Nomor Surat Terisi!');
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
            'edit' => $edit,
        ];

        return view('admin/detailSuratRekomendasi', $data);
    }

    public function SaveSuratRekomendasi(Request $request)
    {
        if (isset($request->dokumen)) {
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
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratRekomendasiModel::where('id', $request->id)->update([
                'nama_surat' => $filename,
                'no_surat' => $no_surat,
            ]);

            return back()->with('success', 'Berhasil Upload Data!');
        }
        if (! isset($request->dokumen)) {
            $no_surat = (isset($request->no_surat))?$request->no_surat:'';
            SuratRekomendasiModel::where('id', $request->id)->update([
                'no_surat' => $no_surat,
            ]);
            return back()->with('success', 'Berhasil Upload Data!');
        }

        return back()->with('failed', 'Gagal Upload Data!. Pastikan File Surat dan Nomor Surat Terisi!');
    }

    public function StatusSurat($jenis_surat, $id, $status_surat)
    {
        if ($jenis_surat === 'aktif_kuliah') {
            if ($status_surat === 'Selesai') {
                $surat = SuratAktifKuliahModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratAktifKuliahModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } elseif ($jenis_surat === 'kp') {
            if ($status_surat === 'Selesai') {
                $surat = SuratKPModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratKPModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } elseif ($jenis_surat === 'magang') {
            if ($status_surat === 'Selesai') {
                $surat = SuratMagangModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratMagangModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } elseif ($jenis_surat === 'pengambilan_data') {
            if ($status_surat === 'Selesai') {
                $surat = SuratPengambilanDataModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratPengambilanDataModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } elseif ($jenis_surat === 'transkrip_nilai') {
            if ($status_surat === 'Selesai') {
                $surat = PermohonanTranskripNilaiModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            PermohonanTranskripNilaiModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } elseif ($jenis_surat === 'rekomendasi') {
            if ($status_surat === 'Selesai') {
                $surat = SuratRekomendasiModel::where('id', $id)->get();
                if ($surat[0]['nama_surat'] === null) {
                    return back()->with('failed', 'Silahkan Upload File Surat Terlebih Dahulu!');
                }
            }
            SuratRekomendasiModel::where('id', $id)->update([
                'status_surat' => $status_surat,
            ]);
        } else {
            return back()->with('failed', 'Gagal Update Data!');
        }

        return back()->with('success', 'Berhasil Update Data!');
    }

    public function HapusSurat($jenis_surat, $id)
    {
        if ($jenis_surat === 'aktif_kuliah') {
            SuratAktifKuliahModel::where('id', $id)->delete();
        } elseif ($jenis_surat === 'kp') {
            SuratKPModel::where('id', $id)->delete();
        } elseif ($jenis_surat === 'magang') {
            SuratMagangModel::where('id', $id)->delete();
        } elseif ($jenis_surat === 'pengambilan_data') {
            SuratPengambilanDataModel::where('id', $id)->delete();
        } elseif ($jenis_surat === 'transkrip_nilai') {
            PermohonanTranskripNilaiModel::where('id', $id)->delete();
        } elseif ($jenis_surat === 'rekomendasi') {
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
            'number' => 0,
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
            'num' => 0,
        ];

        return view('admin/draftaktifkuliah', $data);
    }

    public function DraftKP()
    {
        $data = [
            'surat' => SuratKPModel::get(),
            'num' => 0,
        ];

        return view('admin/draftpermohonankp', $data);
    }

    public function DraftMagang()
    {
        $data = [
            'surat' => SuratMagangModel::get(),
            'num' => 0,
        ];

        return view('admin/draftpermohonanmagang', $data);
    }

    public function DraftPengambilanData()
    {
        $data = [
            'surat' => SuratPengambilanDataModel::get(),
            'num' => 0,
        ];

        return view('admin/draftpengambilandata', $data);
    }

    public function DraftRekomendasi()
    {
        $data = [
            'surat' => SuratRekomendasiModel::get(),
            'num' => 0,
        ];

        return view('admin/draftsuratrekomendasi', $data);
    }

    public function DraftTranskripNilai()
    {
        $data = [
            'surat' => PermohonanTranskripNilaiModel::get(),
            'num' => 0,
        ];

        return view('admin/drafttranskripnilai', $data);
    }

    public function DraftSurat($jenis_surat, $nama_surat)
    {
        $headers = [
            'Content-type' => 'application/pdf',
        ];

        if ($jenis_surat === 'aktif_kuliah') {
            $pathToFile = storage_path('app').'/SuratAktifKuliah/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === 'kp') {
            $pathToFile = storage_path('app').'/SuratKP/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === 'magang') {
            $pathToFile = storage_path('app').'/SuratMagang/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === 'pengambilan_data') {
            $pathToFile = storage_path('app').'/SuratPengambilanData/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === 'transkrip_nilai') {
            $pathToFile = storage_path('app').'/SuratTranskripNilai/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } elseif ($jenis_surat === 'rekomendasi') {
            $pathToFile = storage_path('app').'/SuratRekomendasi/'.$nama_surat;

            return response()->file($pathToFile, $headers);
        } else {
            return back()->with('failed', 'Gagal Update Data!');
        }

        return back()->with('success', 'Berhasil Update Data!');
    }

    public function ManajemenAkun()
    {
        $data = [

            'data' => User::get(),
            'number' => 0,

        ];

        return view('super_admin.manajemen_akun', $data);
    }

    public function HapusAkun($id)
    {
        User::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Akun!');
    }

    public function PreviewDraftSurat($jenis_surat, $id_permohonan, $download = false)
    {
        $fmt= new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            );
        if ($jenis_surat === 'aktif_kuliah') {
            $surat = SuratAktifKuliahModel::where('id', $id_permohonan)->get();

            if (count($surat) === 0) {
                return back()->with('failed', 'Data tidak ditemukan!');
            }           
            $data = [
                'data' => $surat,
                'no_hp' => $surat[0]->no_hp,
                'title' => 'Draft Surat Aktif Kuliah',
            ];
            if ($download === 'download') {
                $templateProcessor = new TemplateProcessor(storage_path('app/template/aktifKuliah.docx'));
                $templateProcessor->setValues([
                    'noSurat' => $surat[0]->no_surat,
                    'dateNow' => $fmt->format(Carbon::now()),
                    'yearNow' => date('Y'),
                    'name' => $surat[0]->nama,
                    'nim' => $surat[0]->nim,
                    'ttl' => $surat[0]->tempat_lahir.', '.$fmt->format(strtotime($surat[0]->tanggal_lahir)),
                    'programStudi' => $surat[0]->program_studi,
                    'noHp' => $surat[0]->no_hp,
                    'tahunAkademik' => date('Y'). '/' .date('Y', strtotime('+1 year')),
                ]);
                $templateProcessor->saveAs(storage_path('app/template/SuratAktifKuliah_'. $surat[0]->nim .'.docx'));
                return response()->download(storage_path('app/template/SuratAktifKuliah_'. $surat[0]->nim .'.docx'))->deleteFileAfterSend(true);
            }
            return view('admin.previewDraftAktifKuliah', $data);
        } elseif ($jenis_surat === 'kp') {
            $surat = SuratKPModel::where('id', $id_permohonan)->get();

            if (count($surat) === 0) {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $data = [
                'data' => $surat,
                'no_hp' => $surat[0]->no_hp,
                'title' => 'Draft Surat Praktik Kerja',
            ];
            if ($download === 'download') {
                $templateProcessor = new TemplateProcessor(storage_path('app/template/kp.docx'));
                $templateProcessor->setValues([
                    'noSurat' => $surat[0]->no_surat,
                    'dateNow' => $fmt->format(Carbon::now()),
                    'yearNow' => date('Y'),
                    'name' => $surat[0]->nama,
                    'nim' => $surat[0]->nim,
                    'programStudi' => $surat[0]->program_studi,
                    'noHp' => $surat[0]->no_hp,
                    'tujuan' => $surat[0]->tujuan_surat,
                    'alamat' => $surat[0]->alamat_surat,
                    'startDate' => $fmt->format(strtotime($surat[0]->tanggal_mulai)),
                    'endDate' => $fmt->format(strtotime($surat[0]->tanggal_selesai)),
                ]);
                $templateProcessor->saveAs(storage_path('app/template/SuratKP_'. $surat[0]->nim .'.docx'));
                return response()->download(storage_path('app/template/SuratKP_'. $surat[0]->nim .'.docx'))->deleteFileAfterSend(true);
            }
            return view('admin.previewDraftKP', $data);
        } elseif ($jenis_surat === 'magang') {
            $surat = SuratMagangModel::where('id', $id_permohonan)->get();

            if (count($surat) === 0) {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $data = [
                'data' => $surat,
                'no_hp' => $surat[0]->no_hp,
                'title' => 'Draft Surat Magang',
            ];
            if ($download === 'download') {
                $templateProcessor = new TemplateProcessor(storage_path('app/template/magang.docx'));
                $templateProcessor->setValues([
                    'noSurat' => $surat[0]->no_surat,
                    'dateNow' => $fmt->format(Carbon::now()),
                    'yearNow' => date('Y'),
                    'name' => $surat[0]->nama,
                    'nim' => $surat[0]->nim,
                    'programStudi' => $surat[0]->program_studi,
                    'noHp' => $surat[0]->no_hp,
                    'tujuan' => $surat[0]->tujuan_surat,
                    'alamat' => $surat[0]->alamat_surat,
                    'startDate' => $fmt->format(strtotime($surat[0]->tanggal_mulai)),
                    'endDate' => $fmt->format(strtotime($surat[0]->tanggal_selesai)),
                ]);
                $templateProcessor->saveAs(storage_path('app/template/SuratMagang_'. $surat[0]->nim .'.docx'));
                return response()->download(storage_path('app/template/SuratMagang_'. $surat[0]->nim .'.docx'))->deleteFileAfterSend(true);
            }
            return view('admin.previewDraftMagang', $data);
        } elseif ($jenis_surat === 'pengambilan_data') {
            $surat = SuratPengambilanDataModel::where('id', $id_permohonan)->get();

            if (count($surat) === 0) {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $data = [
                'data' => $surat,
                'no_hp' => $surat[0]->no_hp,
                'title' => 'Draft Surat Pengambilan Data',
            ];
            if ($download === 'download') {
                $templateProcessor = new TemplateProcessor(storage_path('app/template/pengambilanData.docx'));
                $templateProcessor->setValues([
                    'noSurat' => $surat[0]->no_surat,
                    'dateNow' => $fmt->format(Carbon::now()),
                    'yearNow' => date('Y'),
                    'name' => $surat[0]->nama,
                    'nim' => $surat[0]->nim,
                    'ttl' => $surat[0]->tempat_lahir.', '.$fmt->format(strtotime($surat[0]->tanggal_lahir)),
                    'programStudi' => $surat[0]->program_studi,
                    'noHp' => $surat[0]->no_hp,
                    'tujuan' => $surat[0]->tujuan_surat,
                    'alamat' => $surat[0]->alamat_surat,
                    'judul' => strip_tags($surat[0]->judul_skripsi),
                ]);
                $templateProcessor->saveAs(storage_path('app/template/SuratPengambilanData_'. $surat[0]->nim .'.docx'));
                return response()->download(storage_path('app/template/SuratPengambilanData_'. $surat[0]->nim .'.docx'))->deleteFileAfterSend(true);
            }
            return view('admin.previewDraftPengambilanData', $data);
        } elseif ($jenis_surat === 'transkrip_nilai') {
            return back()->with('failed', 'Gagal Mengambil Data!');
        } elseif ($jenis_surat === 'rekomendasi') {
            $surat = SuratRekomendasiModel::where('id', $id_permohonan)->get();

            if (count($surat) === 0) {
                return back()->with('failed', 'Data tidak ditemukan!');
            }
            $data = [
                'data' => $surat,
                'no_hp' => $surat[0]->no_hp,
                'title' => 'Draft Surat Rekomendasi',
            ];
            if ($download === 'download') {
                $templateProcessor = new TemplateProcessor(storage_path('app/template/rekomendasi.docx'));
                $templateProcessor->setValues([
                    'noSurat' => $surat[0]->no_surat,
                    'dateNow' => $fmt->format(Carbon::now()),
                    'yearNow' => date('Y'),
                    'name' => $surat[0]->nama,
                    'nim' => $surat[0]->nim,
                    'programStudi' => $surat[0]->program_studi,
                    'tahunAkademik' => date('Y'). '/' .date('Y', strtotime('+1 year')),
                ]);
                $templateProcessor->saveAs(storage_path('app/template/SuratRekomendasi_'. $surat[0]->nim .'.docx'));
                return response()->download(storage_path('app/template/SuratRekomendasi_'. $surat[0]->nim .'.docx'))->deleteFileAfterSend(true);
            }
            return view('admin.previewDraftRekomendasi', $data);
        }

        return back()->with('failed', 'Gagal Mengambil Data!');
    }

    public function sidebarStatus()
    {
        $transkrip = PermohonanTranskripNilaiModel::where('status_surat', null)->count();
        $aktifKuliah = SuratAktifKuliahModel::whereNull('status_surat')->count();
        $kp = SuratKPModel::where('status_surat', null)->count();
        $magang = SuratMagangModel::where('status_surat', null)->count();
        $pengambilanData = SuratPengambilanDataModel::where('status_surat', null)->count();
        $rekomendasi = SuratRekomendasiModel::where('status_surat', null)->count();

        $data = [
            'aktifKuliah' => $aktifKuliah,
            'transkrip' => $transkrip,
            'kp' => $kp,
            'magang' => $magang,
            'pengambilanData' => $pengambilanData,
            'rekomendasi' => $rekomendasi
        ];

        return response()->json($data, 200);
    }

    public function tolakSurat(Request $request, $jenis_surat, $id_permohonan)
    {
        $validator = Validator::make($request->all(), [
            'tolak' => 'required|string|max:255',
        ],['required'=>'Silahkan Isi!']);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        if ($jenis_surat === 'aktif_kuliah') {
            SuratAktifKuliahModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } elseif ($jenis_surat === 'kp') {
            SuratKPModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } elseif ($jenis_surat === 'magang') {
            SuratMagangModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } elseif ($jenis_surat === 'pengambilan_data') {
            SuratPengambilanDataModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } elseif ($jenis_surat === 'transkrip_nilai') {
            PermohonanTranskripNilaiModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } elseif ($jenis_surat === 'rekomendasi') {
            SuratRekomendasiModel::where('id', $id_permohonan)->update([
                'status_surat' => 'Ditolak | '.$validated['tolak'],
            ]);
        } else {
            return back()->with('failed', 'Gagal Update Data!');
        }
        return back()->with('success', 'Berhasil Update Data!');
    }

    public function rekapSurat()
    {
        $aktifKuliah = SuratAktifKuliahModel::get();
        $kp = SuratKPModel::get();
        $magang = SuratMagangModel::get();
        $pengambilanData = SuratPengambilanDataModel::get();
        $transkrip = PermohonanTranskripNilaiModel::get();
        $rekomendasi = SuratRekomendasiModel::get();
        $number = 1;
        $rowNumber = 2;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValueByColumnAndRow(1, 1, 'No');
        $sheet->setCellValueByColumnAndRow(2,1,'Nama Mahasiswa');
        $sheet->setCellValueByColumnAndRow(3,1,'Tanggal Surat Masuk');
        $sheet->setCellValueByColumnAndRow(4,1,'Tanggal Surat Selesai');
        $sheet->setCellValueByColumnAndRow(5,1,'Nomor Surat');
        $sheet->setCellValueByColumnAndRow(6,1,'Jenis Surat');
        foreach ($aktifKuliah as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Aktif Kuliah');

            $rowNumber+=1;
        }
        foreach ($kp as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Permohonan KP');

            $rowNumber+=1;
        }
        foreach ($magang as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Permohonan Magang');

            $rowNumber+=1;
        }
        foreach ($pengambilanData as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Permohonan Pengambilan Data');

            $rowNumber+=1;
        }
        foreach ($transkrip as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Transkrip Sementara');

            $rowNumber+=1;
        }
        foreach ($rekomendasi as $item) {
            $sheet->setCellValueByColumnAndRow(1,$rowNumber,$number++);
            $sheet->setCellValueByColumnAndRow(2,$rowNumber,$item['nama']);
            $sheet->setCellValueByColumnAndRow(3,$rowNumber,$item['created_at']);
            if ($item['status_surat'] === 'Selesai') {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['updated_at']);
            } elseif ($item['status_surat'] === null) {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,'Belum Diproses');
            } else {
                $sheet->setCellValueByColumnAndRow(4,$rowNumber,$item['status_surat']);
            }
            $sheet->setCellValueByColumnAndRow(5,$rowNumber,$item['no_surat']);
            $sheet->setCellValueByColumnAndRow(6,$rowNumber,'Surat Rekomendasi');

            $rowNumber+=1;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('/app/template/'.'RekapPermohonanSurat_'.date('d-m-Y').'.xlsx'));
        return response()->download(storage_path('/app/template/'.'RekapPermohonanSurat_'.date('d-m-Y').'.xlsx'))->deleteFileAfterSend(true);

    }
}
