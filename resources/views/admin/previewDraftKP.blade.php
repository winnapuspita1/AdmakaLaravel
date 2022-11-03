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
</head>
<body>
    <div class="sticky-top">
        <a class="btn btn-primary ms-3 mt-3" href="{{url('detail_permohonan_kp/'.$data[0]['id'])}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
                        <p class="my-0">Website : <a href="https://ft.umrah.ac.id">https://ft.umrah.ac.id</a> e-mail : teknik@umrah.ac.id</p>
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
                        <p class="my-0" style="width: 500px">: ………/UN53.4/KM/2022</p>
                        <p class="my-0">{{date('d F Y')}}</p>
                    </div>
                    <p>: Permohonan Praktik Kerja</p>
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
                <p>Dengan Hormat,</p>
            </div>
            <div class="d-flex flex-row mx-auto mt-2">
                <p>Sehubungan dengan pelaksanaan mata kuliah kerja praktik mahasiswa sesuai dengan kurikulum Program Studi yang berada di lingkungan Fakultas Teknik Universitas Maritim Raja Ali Haji, maka dengan ini kami sampaikan mahasiswa berikut ini :</p>
            </div>
            <div class="d-flex flex-row mx-auto mt-4">
                <table class="table table-bordered text-center" style="border-color: #000000;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NAMA</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>NO.HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$data[0]->nama}}</td>
                            <td>{{$data[0]->nim}}</td>
                            <td>{{$data[0]->program_studi}}</td>
                            <td>{{$no_hp}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="d-flex flex-row mx-auto mt-3">
                    <p>Adapun pelaksanaan waktu Praktik Kerja akan dilaksanakan mulai dari tanggal {{date('d-F-Y',strtotime($data[0]->tanggal_mulai))}} s.d {{date('d-F-Y',strtotime($data[0]->tanggal_selesai))}}. Besar harapan kami untuk dapat memberikan kesempatan serta membantu memfasilitasi mahasiswa sesuai dengan kondisi yang ada.</p>
                </div>
            </div>
            <div class="d-flex flex-row mx-auto mt-3 mb-5">
                <p>
                    Demikian surat ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
                </p>
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
