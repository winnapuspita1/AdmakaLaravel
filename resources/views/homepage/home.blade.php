@extends('homepage.index')

@section('title', 'ADMAKA - Landingpage')

@section('content')
    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <h3 class="text-center text-xl font-semibold sm:text-3xl">Halo, Selamat Datang di<br>
            <span class="text-sky-700">Pelayanan Akademik Teknik Informatika</span>
        </h3>
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

    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <div class="w-full p-6 bg-gray-100 border border-gray-100 rounded-lg ">
            <a href="#" class="text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Bantu kami meningkatkan sistem lebih bagus
                </h5>
            </a>
            <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400">
                Berikan saran anda untuk meningkatkan status layanan.
            </p>

            <div class="grid grid-cols-2">
                <div>
                    <form id="formKritikSaran">
                        <div id="div-message" class="mb-5"></div>
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama
                            </label>
                            <input name="nama" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="namamu">
                            <span id="nama" class="text-sm text-red-500"></span>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Saran Kritik
                            </label>
                            <textarea name="kritik_saran" id="editor"></textarea>
                            <span id="kritik_saran" class="text-sm text-red-500"></span>
                        </div>
                        <button type="submit"
                            class="items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Kotak Saran
                        </button>
                    </form>
                </div>
                <div class="my-auto">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/feedbacks.svg') }}" class="h-16" alt=""
                            srcset="">
                    </div>
                    <h3 class="text-sm font-medium text-center">Total saran yang masuk</h3>
                    <h1 class="text-2xl font-bold text-center text-sky-700">{{ $count_kritik ?? 0 }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        $('#formKritikSaran').on('submit', function(e) {
            e.preventDefault();

            const form = new FormData(this);
            form.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: `{{ Route('kotak-saran') }}`,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: form,
                success: function(response) {
                    $('#div-message').append(`
                        @include('homepage.components.success-alert', [
                            'message' => '${response.message}',
                        ])
                    `)
                    $('#formKritikSaran')[0].reset();
                    $('#editor').html('');
                    setTimeout(() => {
                        $('#success-alert').remove()
                    }, 2000);
                },
                error: function(response) {
                    const errors = response.responseJSON.errors
                    for (const key in errors) {
                        $(`input[name=${key}]`).removeClass('border-gray-300')
                        $(`input[name=${key}]`).addClass('border-red-500')
                        $(`#${key}`).html(errors[key])

                        resetErrors(key)
                    }
                }
            })
        })

        function resetErrors(key) {
            setTimeout(() => {
                $(`input[name=${key}]`).removeClass('border-red-500')
                $(`input[name=${key}]`).addClass('border-gray-300')

                $(`#${key}`).html('')
            }, 3000);
        }
    </script>
@endpush
