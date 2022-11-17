@extends('homepage.index')

@section('title', 'ADMAKA - Landingpage')

@section('content')
    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <h3 class="text-center text-xl font-semibold sm:text-3xl">Halo, Selamat Datang di <span
                class="text-sky-700">ADMAKA</span></h3>
        <p class="text-center mt-2">
            Semua jadi lebih mudah, ringan dan cepat.
            Pantau status request di halaman
            <a href="">Cek Status</a>
        </p>
    </div>

    <div class="bg-gray-100 py-5 mb-5">
        <div class="container mx-auto px-2 sm:px-4 py-2.5">
            <p class="text-lg font-semibold mb-3">List surat : </p>

            <div class="grid gap-4 grid-cols-1 sm:grid-cols-3 ">
                @foreach ($surat_availables as $surat)
                    <div>
                        @include('homepage.components.card', [
                            'id' => $surat['id'],
                            'title' => $surat['title'],
                            'description' => $surat['description'],
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <p class="text-lg font-semibold mb-3">List template surat : </p>
        @include('homepage.components.template-surat', ['templates' => $surat_templates])
    </div>
@endsection
