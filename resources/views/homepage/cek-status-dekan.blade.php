@extends('homepage.index')

@section('title', 'ADMAKA - Landingpage')

@section('content')
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <div class="bg-gray-100 py-5 mb-5">
        <div class="container mx-auto px-2 sm:px-4 py-2.5">
            <h3 class="text-center text-xl font-semibold sm:text-3xl">
                <span class="text-sky-700">Cek Status</span> Surat
            </h3>
            <p class="text-center mt-2">
                Silahkan Masukkan NIM
            </p>
        </div>
    </div>

    <div class="container mx-auto px-2 sm:px-4 py-2.5 mb-5">
        <form>
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by nim" required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    <div class="container mx-auto px-2 sm:px-4 py-1 mb-5">
        <h3 class="text-md font-semibold sm:text-lg mb-3">
            List Data :
        </h3>
        <div class="overflow-x-scroll md:overflow-hidden">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th scope="col" class="py-3 px-6">NIM</th>
                        <th scope="col" class="py-3 px-6">Type</th>
                        <th scope="col" class="py-3 px-6">Request Tanggal</th>
                        <th scope="col" class="py-3 px-6">Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ Route('cekstatus') }}`,
                    data: function(e){
                        e.search = $('#search').val()

                        return e
                    }
                },
                columns: [
                    {
                        data: 'nim'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'status'
                    }
                ],
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
                order: [[2, 'desc']]
            });

            $('form').on('submit', function(e){
                e.preventDefault();

                table.ajax.reload()
            })
        });
    </script>
@endpush
