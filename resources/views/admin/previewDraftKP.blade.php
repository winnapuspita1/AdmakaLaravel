<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title ?? ''}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  {{-- <style>
    table.table-fit {
      width: auto !important;
      table-layout: auto !important;
    }
    table.table-fit thead th, table.table-fit tfoot th {
        width: auto !important;
    }
    table.table-fit tbody td, table.table-fit tfoot td {
        width: auto !important;
    }
  </style> --}}
</head>
<body>

    <div class="container" style="width: 750px">
        
            <div class="d-flex flex-row mx-auto mt-2">
                <div class="d-flex flex-column me-4">
                    <img src="{{asset('assets/dist/img/logo-umrah.png')}}" class="ms-4 me-5 mt-3" style="width: 120px;" alt="">
                </div>
                <div class="d-flex flex-column text-center">
                    <div>
                        <p class="my-0 h5">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</p>
                        <p class="my-0 h5">RISET DAN TEKNOLOGI</p>
                        <p class="my-0 fw-bold h5">UNIVERSITAS MARITIM RAJA ALI HAJI</p>
                        <p class="my-0 fw-bold h5">FAKULTAS TEKNIK</p>
                        <p class="my-0">Jl. Politeknik Senggarang Telp. (0771)4500097; Fax. (0771)4500097</p>
                        <p class="my-0">PO. BOX 155, Tanjungpinang 29100</p>
                        <p class="my-0">Website : <a href="https://ft.umrah.ac.id">https://ft.umrah.ac.id</a> e-mail : teknik@umrah.ac.id</p>
                    </div>
                </div>
            </div>
            <hr style="color: #000000 !important; border:2px solid currentcolor !important; opacity:1;">
            <div class="d-flex flex-row mx-auto mt-5">
                <div class="container text-center">
                    <p class="fst-italic fw-bold text-decoration-underline my-0">SURAT KETERANGAN</p>
                    <p class="my-0">No : ……/UN53.4/KM/{{date('Y')}}</p>
                </div>
                
            </div>
            <div class="d-flex flex-row mx-auto mt-5">
                <div class="">
                    <p>Dekan Fakultas Teknik Universitas Maritim Raja Ali Haji dengan ini menerangkan :</p>
                </div>                
            </div>
            <div >
                <div class="d-flex flex-row mx-auto mt-3">
                    <div class="d-flex flex-column me-1">
                        <p>Nama</p>
                        <p>NIM</p>
                        <p>Tempat, Tanggal Lahir</p>
                        <p>Program Studi/Jenjang</p>
                        <p>Semester/Tahun Akademik</p>
                        <p>Nomor Hp</p>
                    </div>
                    <div class="d-flex flex-column">
                        @foreach ($data as $item)
                            <p>: {{$item['nama']}}</p>
                            <p>: {{$item['nim']}}</p>
                            <p>: {{$item['tempat_lahir']. ', ' .$item['tanggal_lahir']}}</p>
                            <p>: Teknik Informatika/ S-1</p>
                            <p>: {{'- / T.A ' . date('Y'). '-' .date('Y', strtotime('+1 year'))}}</p>
                            <p>: {{$no_hp}}</p>
                        @endforeach
                    </div>
                </div>
            </div>            
            <div class="d-flex flex-row mx-auto mt-3">
                <div class="">
                    <p class="my-0">Adalah benar Mahasiswa Aktif di Fakultas Teknik Universitas Maritim Raja Ali Haji</p>
                    <p class="my-0">Tahun Akademik 2022/2023.</p>
                </div>
            </div>
            <div class="d-flex flex-row mx-auto mt-3 mb-5">
                <div class="">
                    <p>Demikian Surat Keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
                </div>
            </div>
            <div class="d-flex flex-row mx-auto mt-4 mb-5">
                <div class="container" style="width: 400px">

                </div>
                <div class="d-flex flex-column">
                    <p class="my-0">Tanjungpinang, {{date('d-F-Y')}}</p>
                    <p style="margin-bottom: 100px">Dekan,</p>
                    <p class="my-0">Ir. Sapta Nugraha, S.T., M. Eng.</p>
                    <p class="my-0">NIP 198904132015041005</p>
                </div>
            </div>
            

    </div>


<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

</body>
</html>
