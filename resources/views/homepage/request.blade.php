@extends('homepage.index')

@section('title', 'Request - ' . $surat['title'])

@section('content')
    <div class="bg-sky-600 py-5 mb-5">
        <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
            <h3 class="text-center text-gray-100 text-xl font-semibold sm:text-3xl">{{ Str::title($surat['title']) }}</h3>
            <p class="text-center text-white mt-2">
                Surat anda akan diproses oleh admin, cek status di halaman cek status
            </p>
        </div>
    </div>

    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <h3 class="text-xl font-semibold mb-4">Form Isian :</h3>
        <div id="div-message"></div>
        <form id="suratAktifKuliah">
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
                <div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@umrah.ac.id">
                        <span id="email" class="text-sm text-red-500"></span>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIM
                        </label>
                        <input type="text" name="nim"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="NIM">
                        <span id="nim" class="text-sm text-red-500"></span>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama
                        </label>
                        <input name="nama" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Anda">
                        <span id="nama" class="text-sm text-red-500"></span>
                    </div>
                </div>
                <div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Program Studi
                        </label>
                        <input name="program_studi" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="teknik informatika">
                        <span id="program_studi" class="text-sm text-red-500"></span>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tempat Lahir
                        </label>
                        <input name="tempat_lahir" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="tanjung pinang">
                        <span id="tempat_lahir" class="text-sm text-red-500"></span>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Lahir
                        </label>
                        <input name="tanggal_lahir" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span id="tanggal_lahir" class="text-sm text-red-500"></span>
                    </div>
                </div>
            </div>
            @if ($type == 2 || $type == 3)
                @include('homepage.components.form.surat-kp-or-magang')
            @endif

            @if ($type == 4)
                @include('homepage.components.form.surat-kp-or-magang')

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Judul Skripsi
                    </label>
                    <textarea name="judul_skripsi" id="editor"></textarea>
                    <span id="judul_skripsi" class="text-sm text-red-500"></span>
                </div>
            @endif

            @if ($type == 1 || $type == 5 || $type == 6)
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Keperluan
                    </label>
                    <textarea name="keperluan" id="editor"></textarea>
                    <span id="keperluan" class="text-sm text-red-500"></span>
                </div>
            @endif
            <div class="text-center">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            </div>
        </form>
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

        $('#suratAktifKuliah').on('submit', function(e) {
            e.preventDefault();

            const form = new FormData(this);
            form.append('_token', '{{ csrf_token() }}')
            $.ajax({
                url: `{{ Route('store.surat') }}`,
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
                    $('#suratAktifKuliah')[0].reset();
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
