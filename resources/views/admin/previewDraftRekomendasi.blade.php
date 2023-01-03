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
  <style>
    div{
        font-family: "Times New Roman", Times, serif;
    }
  </style>
</head>
<body>
    @php
        $fmt= new IntlDateFormatter(
        'id_ID',
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        'Asia/Jakarta',
        IntlDateFormatter::GREGORIAN,
        );
    @endphp
    <div class="sticky-top">
        <a class="btn btn-primary ms-3 mt-3" href="{{url('detail_surat_rekomendasi/'.$data[0]['id'])}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
    <div class="container shadow p-5 mb-5 rounded" style="width: 800px;">
            <div class="d-flex flex-row mx-auto">        
                <div class="d-flex flex-column me-4">
                    <img src="{{asset('assets/dist/img/logo-umrah.png')}}" class="ms-3 me-4 mt-3" style="width: 120px;" alt="">
                </div>
                <div class="d-flex flex-column text-center">
                    <div>
                        <p class="my-0 h5">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</p>
                        <p class="my-0 h5">RISET DAN TEKNOLOGI</p>
                        <p class="my-0 fw-bold h5">UNIVERSITAS MARITIM RAJA ALI HAJI</p>
                        <p class="my-0 fw-bold h5">FAKULTAS TEKNIK</p>
                        <p class="my-0">Jl. Politeknik Senggarang Telp. (0771)4500097; Fax. (0771)4500097</p>
                        <p class="my-0">PO. BOX 155, Tanjungpinang 29100</p>
                        <p class="my-0">Website : <a href="https://ft.umrah.ac.id">https://ft.umrah.ac.id</a> e-mail : ft@umrah.ac.id</p>
                    </div>
                </div>
            </div>
            <hr style="color: #000000 !important; border:2px solid currentcolor !important; opacity:1;">
            <div class="d-flex flex-row mx-auto mt-5">
                <div class="container text-center">
                    <p class="fw-bold text-decoration-underline my-0">SURAT REKOMENDASI</p>
                    <p class="my-0">No : {{(isset($data[0]->no_surat))?$data[0]->no_surat:'……'}}/UN53.4/TU/{{date('Y')}}</p>
                </div>
                
            </div>
            <div class="d-flex flex-row mx-auto mt-5">
                
                    <p class="my-0">Saya yang bertanda tangan dibawah ini :</p>
                               
            </div>
            <div >
                <div class="d-flex flex-row mx-auto">
                    <div class="d-flex flex-column me-1">                        
                        <p class="my-0">&emsp;&emsp;Nama</p>
                        <p class="my-0">&emsp;&emsp;Jabatan</p>
                        <p class="my-0">&emsp;&emsp;NIP</p>
                        <p class="my-0">&emsp;&emsp;Email</p>
                        <p>&emsp;&emsp;No Tlp / Whatsapp</p>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="my-0">&emsp;&emsp;: ….………</p>
                        <p class="my-0">&emsp;&emsp;: ….………</p>
                        <p class="my-0">&emsp;&emsp;: ….………</p>
                        <p class="my-0">&emsp;&emsp;: ….………</p>
                        <p>&emsp;&emsp;: ….………</p>
                    </div>
                </div>
            </div>            
            <div class="d-flex flex-row mx-auto mt-3">
                <div class="">
                    <p class="my-0" style="text-align: justify;text-justify: inter-word;">Dengan ini memberikan rekomendasi dan persetujuan kepada mahasiswa/i kami :</p>
                    
                </div>
            </div>
            <div >
                <div class="d-flex flex-row mx-auto">
                    <div class="d-flex flex-column me-1">                        
                        <p class="my-0">&emsp;&emsp;Nama</p>
                        <p class="my-0">&emsp;&emsp;Nim</p>
                        <p class="my-0">&emsp;&emsp;Program Studi/Jurusan</p>
                        <p class="my-0">&emsp;&emsp;Fakultas</p>
                        <p class="my-0">&emsp;&emsp;Semester</p>
                        <p>&emsp;&emsp;IPK</p>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="my-0">: {{$data[0]->nama}}</p>
                        <p class="my-0">: {{$data[0]->nim}}</p>
                        <p class="my-0">: {{$data[0]->program_studi}}</p>
                        <p class="my-0">: Fakultas Teknik</p>
                        <p class="my-0">: ….………</p>
                        <p>: ….………</p>
                    </div>
                </div>
            </div>  
            <div class="d-flex flex-row mx-auto mt-2" >
                <div class="d-flex flex-column">
                    <p class="my-0"  style="text-align: justify;text-justify: inter-word;">Untuk menjadi peserta Program Kampus Merdeka - Studi Independen Bersertifikat Tahun {{date('Y')}} yang diselenggarakan oleh Kemendikbud Ristek.</p>
                <p class="my-0" style="text-align: justify;text-justify: inter-word;">Dengan ini kami menyatakan bahwa yang bersangkutan benar-benar terdaftar sebagai mahasiswa aktif pada program studi <b>Teknik Informatika</b>, Fakultas Teknik Tahun Akademik {{date('Y')}}/{{date('Y', strtotime('+1 year'))}}.</p>
                <p class="my-0">Kami menyatakan kesediaan untuk: </p>
                <p class="my-0" style="text-align: justify;text-justify: inter-word;">1.	Memberikan dukungan sepenuhnya serta bertanggung jawab bilamana terjadi sesuatu hal selama mengikuti program Studi Independen Bersertifikat Tahun {{date('Y')}} sejak awal sampai akhir program</p>
                <p class="my-0" style="text-align: justify;text-justify: inter-word;">2.	Mendukung proses belajar mahasiswa/i kami melalui pengalaman Studi Independen Bersertifikat Tahun {{date('Y')}}</p>
                <p class="my-0" style="text-align: justify;text-justify: inter-word;">3.	Memberikan pengakuan dan konversi 20 sks dalam sistem akademik yang berlaku di Universitas Maritim Raja Ali Haji sesuai peraturan dari Kemendikbud Ristek untuk dapat berpartisipasi dalam program Studi Independen Bersertifikat tahun {{date('Y')}}.</p>
                </div>
            </div>
            <div class="d-flex flex-row mx-auto mt-3 mb-5">
                <p>Demikian surat rekomendasi ini kami sampaikan untuk dipergunakan sebagaimana mestinya.</p>
            </div>
            <div class="d-flex flex-row mx-auto mt-4 mb-5">
                <div class="container" style="width: 400px">

                </div>
                <div class="d-flex flex-column">
                    <p class="my-0">Tanjungpinang, {{$fmt->format(Carbon\Carbon::now())}}</p>
                    <p style="margin-bottom: 100px">Dekan Fakultas Teknik</p>
                    <p class="my-0">Ir. Sapta Nugraha, S.T., M. Eng.</p>
                    <p class="my-0">NIP. 198904132015041005</p>
                </div>
            </div>
            

    </div>


<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

</body>
</html>
