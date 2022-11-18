<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PelayananAdminController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('landingpage');
    Route::get('request/{id_type}', [HomepageController::class, 'requestSurat'])->name('landingpage.type');
    Route::post('request', [HomepageController::class, 'storeSurat'])->name('store.surat');
    
    Route::get('cek-status', [HomepageController::class, 'cekStatus'])->name('cekstatus');
    Route::get('download/{jenis_surat}/{id_surat}', [HomepageController::class, 'downloadSurat'])->name('downloadSurat');
});

Route::get('/dashboard', [PelayananAdminController::class, 'DashboardAdmin'])->middleware(['auth'])->name('dashboard');

//superadmin
Route::middleware(['auth', 'can:isSuperAdmin'])->group(function () {
    Route::get('manajemen-akun', [PelayananAdminController::class, 'ManajemenAkun']);
    Route::post('update-akun', [RegisteredUserController::class, 'update']);
    Route::get('hapus-akun/{id}', [PelayananAdminController::class, 'HapusAkun']);
});

//admin
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('draft_surat/{jenis_surat}/{nama_surat}', [PelayananAdminController::class, 'DraftSurat']);

    Route::get('aktif_kuliah', [PelayananAdminController::class, 'SuratAktifKuliah']);
    Route::get('detail_surat_aktif_kuliah/{id}', [PelayananAdminController::class, 'DetailSuratAktif'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('detail_surat_aktif_kuliah/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratAktif'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('save-surat-aktif-kuliah-admin', [PelayananAdminController::class, 'SaveSuratAktif']);

    Route::get('permohonan_kp', [PelayananAdminController::class, 'SuratKP']);
    Route::get('detail_permohonan_kp/{id}', [PelayananAdminController::class, 'DetailSuratKP'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('detail_permohonan_kp/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratKP'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('save-surat-kp-admin', [PelayananAdminController::class, 'SaveSuratKP']);

    Route::get('permohonan_magang', [PelayananAdminController::class, 'SuratMagang']);
    Route::get('detail_permohonan_magang/{id}', [PelayananAdminController::class, 'DetailSuratMagang'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('detail_permohonan_magang/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratMagang'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('save-surat-magang-admin', [PelayananAdminController::class, 'SaveSuratMagang']);

    Route::get('/pengambilan_data', [PelayananAdminController::class, 'SuratPengambilanData']);
    Route::get('/detail_surat_pengambilan_data/{id}', [PelayananAdminController::class, 'DetailSuratPengambilanData'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('/detail_surat_pengambilan_data/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratPengambilanData'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('/save-surat-pengambilan-data-admin', [PelayananAdminController::class, 'SaveSuratPengambilanData']);

    Route::get('/transkrip_nilai', [PelayananAdminController::class, 'SuratTranskripNilai']);
    Route::get('/detail_transkrip_nilai/{id}', [PelayananAdminController::class, 'DetailSuratTranskripNilai'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('/detail_transkrip_nilai/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratTranskripNilai'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('/save-surat-transkrip-nilai-admin', [PelayananAdminController::class, 'SaveSuratTranskripNilai']);

    Route::get('/surat_rekomendasi', [PelayananAdminController::class, 'SuratRekomendasi']);
    Route::get('/detail_surat_rekomendasi/{id}', [PelayananAdminController::class, 'DetailSuratRekomendasi'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::get('/detail_surat_rekomendasi/{id}/{edit}', [PelayananAdminController::class, 'DetailSuratRekomendasi'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    Route::post('/save-surat-rekomendasi-admin', [PelayananAdminController::class, 'SaveSuratRekomendasi']);
    //status surat selesai
    Route::get('status_surat/{jenis_surat}/{id}/{status_surat}', [PelayananAdminController::class, 'StatusSurat'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);
    //hapus permohonan surat
    Route::get('hapus_surat/{jenis_surat}/{id}', [PelayananAdminController::class, 'HapusSurat'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);

    Route::get('/kritik_saran_admin', [PelayananAdminController::class, 'KritikSaran']);
    Route::get('/delete_kritik_saran_admin/{id}', [PelayananAdminController::class, 'DeleteKritikSaran'])->where(['id' => '([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9][0-9][0-9])']);

    Route::get('/draft_aktif_kuliah', [PelayananAdminController::class, 'DraftAktifKuliah']);
    Route::get('/draft_permohonan_kp', [PelayananAdminController::class, 'DraftKP']);
    Route::get('/draft_permohonan_magang', [PelayananAdminController::class, 'DraftMagang']);
    Route::get('/draft_pengambilan_data', [PelayananAdminController::class, 'DraftPengambilanData']);
    Route::get('/draft_transkrip_nilai', [PelayananAdminController::class, 'DraftTranskripNilai']);
    Route::get('/draft_surat_rekomendasi', [PelayananAdminController::class, 'DraftRekomendasi']);

    Route::get('preview_draft_surat/{jenis_surat}/{id_permohonan}', [PelayananAdminController::class, 'PreviewDraftSurat']);
});

//mahasiswa
Route::middleware(['auth', 'can:isMahasiswa'])->group(function () {
    Route::view('/aktif_kuliah_mahasiswa', 'mahasiswa/aktivkuliah');
    Route::view('/permohonan_kp_mahasiswa', 'mahasiswa/permohonankp');
    Route::view('/permohonan_magang_mahasiswa', 'mahasiswa/permohonanmagang');
    Route::view('/pengambilan_data_mahasiswa', 'mahasiswa/pengambilandata');
    Route::view('/transkrip_nilai_mahasiswa', 'mahasiswa/transkripnilai');
    Route::view('/surat_rekomendasi_mahasiswa', 'mahasiswa/suratrekomendasi');
    Route::view('/kritik_saran_mahasiswa', 'mahasiswa/kritiksaran');
    Route::get('/status_surat_mahasiswa', [PelayananMahasiswaController::class, 'StatusSuratMahasiswa']);
    Route::view('/cekstatus_surat_mahasiswa', 'mahasiswa/cekstatus');
    Route::view('/template_surat_mahasiswa', 'mahasiswa/templatesurat');

    Route::post('save-surat-aktif-kuliah', [PelayananMahasiswaController::class, 'SuratAktifKuliah']);
    Route::post('save-surat-kp', [PelayananMahasiswaController::class, 'SuratKP']);
    Route::post('save-surat-magang', [PelayananMahasiswaController::class, 'SuratMagang']);
    Route::post('save-surat-pengambilan-data', [PelayananMahasiswaController::class, 'SuratPengambilanData']);
    Route::post('save-permohonan-transkrip-nilai', [PelayananMahasiswaController::class, 'PermohonanTranskripNilai']);
    Route::post('save-surat-rekomendasi', [PelayananMahasiswaController::class, 'SuratRekomendasi']);
    Route::post('save-kritik-saran', [PelayananMahasiswaController::class, 'KritikSaran']);
    Route::get('surat-mahasiswa/{jenis_surat}/{nama_surat}', [PelayananMahasiswaController::class, 'DownloadSuratMahasiswa']);
});



require __DIR__ . '/auth.php';
