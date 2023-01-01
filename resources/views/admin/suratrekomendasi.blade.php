@extends('layouts.index')
@section('title', 'Surat Rekomendasi')
@section('breadcrumb', 'Surat Rekomendasi')

@section('content')
<style>
  tr td {
      max-width: 100%;
      white-space: nowrap;
  }
</style>

<div>
  <div class="card">
    @if(session('success'))
    <div class="alert alert-success mt-2 mb-2">
        {!! session('success') !!}
    </div>
    @endif 
    @if(session('failed'))
    <div class="alert alert-danger mt-2 mb-2">
        {!! session('failed') !!}
    </div>
    @endif
    <div class="card-header p-2">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-belum-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-belum-diterima" href="#pills-belum-diterima" type="button" role="tab" aria-controls="pills-home" aria-selected="false" data-toggle="tab">Belum Diterima</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-diterima" href="#pills-diterima" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" data-toggle="tab">Diterima</a>
        </li>
    </ul>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <div class="tab-content">
        <div class="tab-content mt-5" id="pills-tabContent">
          <!-- Menu Belum Diterima -->
          <div class="tab-pane fade" id="pills-belum-diterima" role="tabpanel" aria-labelledby="pills-belum-diterima-tab">
              <div class="">
                  <div class="" style="overflow:auto">
                      <table id="table_id" class="display table shadow table-bordered rounded-1" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Surat Masuk</th>
                            <th scope="col">Pukul</th>                              
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          @php
                              $status = ((isset($item['status_surat']) === true) ? 'Selesai': 'Belum Selesai');
                          @endphp
                            @if ($status === "Belum Selesai")
                              <tr>
                                <th scope="row">{{ $number+=1 }}</th>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['created_at']->format('d-m-Y') }}</td>
                                <td>{{ $item['created_at']->format('H:i:s') }}</td>
                                <td>
                                  <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                      </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="#" onclick="myFunction('{{url('status_surat/rekomendasi/'.$item['id'] . '/Diterima')}}', 'Terima Permohonan Surat', 'Surat dialihkan ke bagian diterima?')">Diterima</a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- Menu Diterima -->
          <div class="tab-pane fade" id="pills-diterima" role="tabpanel" aria-labelledby="pills-diterima-tab">
              <div class="">
                  <div class="" style="overflow:auto">
                      <table id="table_id2" class="display table shadow table-bordered rounded-1" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Surat Masuk</th>
                            <th scope="col">Tanggal Surat Selesai</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Status Surat</th>
                            <th scope="col">Aksi</th>                              
                            <th scope="col">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $number = 0;
                          @endphp
                          @if (isset($data[0]['status_surat']) === true)
                          @foreach ($data as $item)
                            @if ($item['status_surat'] === 'Proses Pengerjaan' || $item['status_surat'] === 'Diterima' || $item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{ $number+=1 }}</th>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['created_at']->format('d-m-Y') }}</td>
                                <td>{{ ($item['status_surat'] === 'Selesai')? $item['updated_at']->format('d-m-Y') : '-' }}</td>
                                <td>{{ $item['no_surat'] }}</td>
                                <td>
                                      @if($item['status_surat'] === 'Selesai')
                                      <p class="text-success">{{$item['status_surat']}}</p>
                                      @endif
                                      @if($item['status_surat'] === 'Diterima')
                                      <p class="text-primary">{{$item['status_surat']}}</p>
                                      @endif
                                      @if($item['status_surat'] === 'Proses Pengerjaan')
                                      <p class="text-warning">{{$item['status_surat']}}</p>
                                      @endif
                                </td>
                                <td>
                                  <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                      </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="#" onclick="myFunction('{{url('status_surat/rekomendasi/'.$item['id'] . '/Proses Pengerjaan')}}', 'Proses Surat', 'Proses permohonan surat mahasiswa?')">Proses</a></li>
                                      <li><a class="dropdown-item" href="#" onclick="myFunction('{{url('status_surat/rekomendasi/'.$item['id'] . '/Selesai')}}', 'Surat Selesai', 'Permohonan surat akan dialihkan ke bagian draft.')">Selesai</a></li>
                                    </ul>
                                  </div>
                                </td>
                                <td>
                                  <a href ="{{url('detail_surat_rekomendasi/'.$item['id'])}}" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
                                  <a href ="{{url('detail_surat_rekomendasi/'.$item['id'].'/true')}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
                                  <button type="button" onclick="myFunctionDelete('{{url('hapus_surat/rekomendasi/'.$item['id'])}}')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </button>
                                </td>
                              </tr>
                              @endif
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Selesai-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal_body"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a id="selesaiBtn" href="" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete-->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a id="selesaiBtn2" href="" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
  <script>
    $(document).ready( function () {
        $('#table_id').DataTable({
          "pageLength": 15,
          "lengthChange": false,
          "columnDefs": [
            { "searchable": false, "targets": 0 }
          ]
        });
    } );

    $(document).ready( function () {
        $('#table_id2').DataTable({
          "pageLength": 15,
          "lengthChange": false,
          "columnDefs": [
            { "searchable": false, "targets": 0 }
          ]
        });
    } );
    
    function myFunction(link,heading,body) {      
      document.getElementById('staticBackdropLabel').innerText = heading;
      document.getElementById('modal_body').innerText = body;  
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
      var btn = document.getElementById('selesaiBtn').href = link; 
      myModal.toggle();
    }

    function myFunctionDelete(link) {      
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop2'));
      var btn = document.getElementById('selesaiBtn2').href = link; 
      myModal.toggle();
    }

    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#pills-tab a[href="' + activeTab + '"]').tab('show');
        } else {
           $('#pills-belum-diterima-tab').tab('show');
        }
    });
  </script>
@endsection