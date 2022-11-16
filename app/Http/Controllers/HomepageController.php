<?php

namespace App\Http\Controllers;

use App\Models\SuratAvailable;
use Illuminate\Http\Request;

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
}
