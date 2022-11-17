<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratAvailable;
use App\Models\SuratAktifKuliahModel;

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
            'surat' => collect(SuratAvailable::SURAT_AVAILABLE)->where('id', $typeId)->first()
        ];

        return view('homepage.request', $data);
    }

    public function storeSurat(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email', 
            'nim'   => 'required',
            'nama'  => 'required',
            'program_studi' => 'required', 
            'tempat_lahir'  => 'required', 
            'tanggal_lahir' => 'required',
            'keperluan'     => 'required'
        ]);

        SuratAktifKuliahModel::updateOrCreate([
            'email' => $validated['email'], 
            'nim'   => $validated['nim'], 
            'status_surat'=> null
        ], $validated);

        return response()->json([
            'message' => 'success saved data'
        ], 200);
    }
}
