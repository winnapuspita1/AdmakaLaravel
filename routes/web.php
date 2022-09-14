<?php

use App\Http\Controllers\PelayananMahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::view('/aktif_kuliah','admin/aktivkuliah');
Route::view('/permohonan_kp','admin/permohonankp');
Route::view('/permohonan_magang','admin/permohonanmagang');
Route::view('/pengambilan_data','admin/pengambilandata');
Route::view('/transkrip_nilai','admin/transkripnilai');
Route::view('/surat_rekomendasi','admin/suratrekomendasi');

Route::view('/aktif_kuliah_mahasiswa','mahasiswa/aktivkuliah');
Route::view('/permohonan_kp_mahasiswa','mahasiswa/permohonankp');
Route::view('/permohonan_magang_mahasiswa','mahasiswa/permohonanmagang');
Route::view('/pengambilan_data_mahasiswa','mahasiswa/pengambilandata');
Route::view('/transkrip_nilai_mahasiswa','mahasiswa/transkripnilai');
Route::view('/surat_rekomendasi_mahasiswa','mahasiswa/suratrekomendasi');
Route::view('/kritik_saran_mahasiswa','mahasiswa/kritiksaran');
Route::view('/status_surat_mahasiswa','mahasiswa/statussurat');
Route::view('/cekstatus_surat_mahasiswa','mahasiswa/cekstatus');

Route::view('/surat_selesai_dekan','dekan/suratselesai');
Route::view('/surat_tandatangan_dekan','dekan/surattandatangan');
Route::view('/tandatangan_dekan','dekan/tandatangan');

Route::post('save-surat-aktif-kuliah', [PelayananMahasiswaController::class, 'SuratAktifKuliah']);
Route::post('save-surat-kp', [PelayananMahasiswaController::class, 'SuratKP']);
Route::post('save-surat-magang', [PelayananMahasiswaController::class, 'SuratMagang']);
Route::post('save-surat-pengambilan-data', [PelayananMahasiswaController::class, 'SuratPengambilanData']);
Route::post('save-permohonan-transkrip-nilai', [PelayananMahasiswaController::class, 'PermohonanTranskripNilai']);
Route::post('save-surat-rekomendasi', [PelayananMahasiswaController::class, 'SuratRekomendasi']);