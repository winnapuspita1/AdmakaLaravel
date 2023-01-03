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
        <a class="btn btn-primary ms-3 mt-3" href="{{url('detail_surat_pengambilan_data/'.$data[0]['id'])}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
                <div class="d-flex flex-column">
                    <p class="my-0">No &emsp;</p>
                    <p class="my-0">Hal &emsp;</p>
                </div> 
                <div class="d-flex flex-column">
                    <div class="d-flex">
                        <p class="my-0" style="width: 500px">: {{(isset($data[0]->no_surat))?$data[0]->no_surat:'………'}}/UN53.4/KM/{{date('Y')}}</p>
                        <p class="my-0">{{$fmt->format(Carbon\Carbon::now())}}</p>
                    </div>
                    <p>: Permohonan Pengambilan Data</p>
                </div>     
            </div>
            
            <div class="d-flex flex-row mx-auto mt-5">
                <div class="d-flex flex-column">
                    <p>Yth. &emsp;</p>
                </div>
                <div class="d-flex flex-column">
                    <p class="my-0"> {{$data[0]->tujuan_surat}}</p>
                    <p> {{$data[0]->alamat_surat}}</p>
                </div>            
            </div>
            <div class="d-flex flex-row mx-auto mt-4">
                <p>Dengan hormat,</p>
            </div>
            <div class="d-flex flex-row mx-auto mt-2">
                <p style="text-align: justify;text-justify: inter-word;">Kami menginformasikan bahwa Mahasiswa Fakultas Teknik Universitas Maritim Raja Ali Haji sebagai berikut :</p>
            </div>
            <div >
                <div class="d-flex flex-row mx-auto">
                    <div class="d-flex flex-column me-1">
                        <p class="my-0">&emsp;&emsp;Nama</p>
                        <p class="my-0">&emsp;&emsp;Tempat, Tanggal Lahir</p>
                        <p class="my-0">&emsp;&emsp;NIM</p>
                        <p class="my-0">&emsp;&emsp;Program Studi</p>
                        <p class="my-0">&emsp;&emsp;No. Telepon</p>
                    </div>
                    <div class="d-flex flex-column">
                        @foreach ($data as $item)
                            <p class="my-0">: {{$item['nama']}}</p>
                            <p class="my-0">: {{$item['tempat_lahir']. ', ' .$fmt->format(strtotime($item['tanggal_lahir']))}}</p>
                            <p class="my-0">: {{$item['nim']}}</p>
                            <p class="my-0">: {{$item['program_studi']}}</p>
                            <p class="my-0">: {{$no_hp ?? ''}}</p>
                        @endforeach
                    </div>
                </div>
            </div>     
            <div>
                <div class="d-flex flex-row mx-auto mt-3">
                    <p style="text-align: justify;text-justify: inter-word;">Akan mengadakan penelitian sebagai salah satu syarat menyelesaikan penyusunan skripsi dengan judul:</p>
                </div>
            </div>
            <div class="d-flex flex-row fw-bold">
                    <div class="mx-auto"><q>{{ strip_tags($data[0]->judul_skripsi) }}</q></div>
            </div>
            <div>
                <div class="d-flex flex-row mx-auto mt-1">
                    <p style="text-align: justify;text-justify: inter-word;">Berhubungan dengan ini, diharapkan untuk dapat memberikan kesempatan serta membantu memfasilitasi mahasiswa sesuai dengan kondisi yang ada.</p>
                </div>
            </div>
            <div>
                <div class="d-flex flex-row mx-auto mt-3">
                    <p>Demikian surat ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih. </p>
                </div>
            </div>
            <div class="d-flex flex-row mx-auto mt-4 mb-5">
                <div class="container" style="width: 400px">

                </div>
                <div class="d-flex flex-column">
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
