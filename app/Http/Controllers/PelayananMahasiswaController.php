<?php

namespace App\Http\Controllers;

use App\Models\KritikSaranModel;
use App\Models\PermohonanTranskripNilaiModel;
use App\Models\SuratAktifKuliahModel;
use App\Models\SuratKPModel;
use App\Models\SuratMagangModel;
use App\Models\SuratPengambilanDataModel;
use App\Models\SuratRekomendasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelayananMahasiswaController extends Controller
{
    public function SuratAktifKuliah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'keperluan' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('aktif_kuliah_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        SuratAktifKuliahModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'keperluan' => $validated['keperluan'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function SuratKP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tujuan_surat' => 'required|max:255',
            'alamat_surat' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',

        ]);

        if ($validator->fails()) {
            return redirect('permohonan_kp_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        SuratKPModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'tujuan_surat' => $validated['tujuan_surat'],
            'alamat_surat' => $validated['alamat_surat'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function SuratMagang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tujuan_surat' => 'required|max:255',
            'alamat_surat' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',

        ]);

        if ($validator->fails()) {
            return redirect('permohonan_magang_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        SuratMagangModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'tujuan_surat' => $validated['tujuan_surat'],
            'alamat_surat' => $validated['alamat_surat'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function SuratPengambilanData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tujuan_surat' => 'required|max:255',
            'alamat_surat' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'judul_skripsi' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('pengambilan_data_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        SuratPengambilanDataModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'tujuan_surat' => $validated['tujuan_surat'],
            'alamat_surat' => $validated['alamat_surat'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'judul_skripsi' => $validated['judul_skripsi'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function PermohonanTranskripNilai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'keperluan' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('transkrip_nilai_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        PermohonanTranskripNilaiModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'keperluan' => $validated['keperluan'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function SuratRekomendasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nim' => 'required|numeric|digits_between:12,12',
            'program_studi' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'keperluan' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('surat_rekomendasi_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        SuratRekomendasiModel::insert([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'keperluan' => $validated['keperluan'],
            'id_mahasiswa' => auth()->user()->id,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),

        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function KritikSaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kritik_saran' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('kritik_saran_mahasiswa')
                        ->with('failed', 'Gagal Menyimpan Data!')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        KritikSaranModel::insert([
            'nama' => auth()->user()->name,
            'kritik_saran' => $validated['kritik_saran'],
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
        ]);

        return back()->with('success', 'Data Tersimpan!');
    }

    public function StatusSuratMahasiswa()
    {
        $id = auth()->user()->id;
        $data = [
            'number' => 0,
            'aktif_kuliah' => SuratAktifKuliahModel::where('id_mahasiswa', $id)->get(),
            'kp' => SuratKPModel::where('id_mahasiswa', $id)->get(),
            'magang' => SuratMagangModel::where('id_mahasiswa', $id)->get(),
            'pengambilan_data' => SuratPengambilanDataModel::where('id_mahasiswa', $id)->get(),
            'transkrip_nilai' => PermohonanTranskripNilaiModel::where('id_mahasiswa', $id)->get(),
            'rekomendasi' => SuratRekomendasiModel::where('id_mahasiswa', $id)->get(),
        ];

        return view('mahasiswa/statussurat', $data);
    }

    public function DownloadSuratMahasiswa($jenis_surat, $nama_surat)
    {
        $id = auth()->user()->id;
        $headers = [
            'Content-type' => 'application/pdf',
        ];
        if ($jenis_surat === 'aktif_kuliah') {
            $status_surat = SuratAktifKuliahModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratAktifKuliah/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        } elseif ($jenis_surat === 'kp') {
            $status_surat = SuratKPModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratKP/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        } elseif ($jenis_surat === 'magang') {
            $status_surat = SuratMagangModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratMagang/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        } elseif ($jenis_surat === 'pengambilan_data') {
            $status_surat = SuratPengambilanDataModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratPengambilanData/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        } elseif ($jenis_surat === 'transkrip_nilai') {
            $status_surat = PermohonanTranskripNilaiModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratTranskripNilai/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        } elseif ($jenis_surat === 'rekomendasi') {
            $status_surat = SuratRekomendasiModel::select('status_surat')->where('nama_surat', $nama_surat)->where('id_mahasiswa', $id)->get();
            if ($status_surat[0]['status_surat'] === 'Selesai') {
                $pathToFile = storage_path('app').'/SuratRekomendasi/'.$nama_surat;

                return response()->download($pathToFile, $nama_surat, $headers);
            }
        }

        return back()->with('failed', 'Gagal Mendownload data!');
    }
}
