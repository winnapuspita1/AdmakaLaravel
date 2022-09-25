@extends('layouts.index')
@section('title', 'Permohonan Pengambilan Data Penelitian')
@section('breadcrumb', 'Permohonan Pengambilan Data Penelitian')

@section('content')
<div>
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-belum-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-belum-diterima" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Belum Diterima</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-diterima" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Diterima</button>
        </li>
    </ul>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
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
      <div class="tab-content">
        <div class="tab-content mt-5" id="pills-tabContent">
          <!-- Menu Belum Diterima -->
          <div class="tab-pane fade show active" id="pills-belum-diterima" role="tabpanel" aria-labelledby="pills-belum-diterima-tab">
              <div class="ps-5 pe-5">
                  <div class="ps-5 pe-5">
                      <table id="penjualan" class="display table shadow table-bordered rounded-1" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
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
                                <td>
                                <a href ="{{url('detail_surat_pengambilan_data/'.$item['id'])}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
                                <a onclick="myFunction('{{url('status_surat/pengambilan_data/'.$item['id'])}}')" class="btn btn-success"> Selesai </a>
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
              <div class="ps-5 pe-5">
                  <div class="ps-5 pe-5">
                      <table id="penitipan" class="display table shadow table-bordered rounded-1" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $number = 0;
                          @endphp
                          @foreach ($data as $item)
                          @php
                              $status = ((isset($item['status_surat']) === true) ? 'Selesai': 'Belum Selesai');
                          @endphp
                          @if ($status === "Selesai")
                            <tr>
                              <th scope="row">{{ $number+=1 }}</th>
                              <td>{{ $item['nama'] }}</td>
                              <td>
                                <a href ="#" class="btn btn-info"> Forward </a>
                                <a href ="{{url('detail_surat_pengambilan_data/'.$item['id'].'/true')}}" class="btn btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
                                <a onclick="myFunctionDelete('{{url('hapus_surat/pengambilan_data/'.$item['id'])}}')" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </a>
                              </td>
                            </tr>
                          @endif
                          @endforeach
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
        <h5 class="modal-title" id="staticBackdropLabel">Surat Selesai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Surat dialihkan ke bagian diterima?
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
    
    function myFunction(link) {      
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
      var btn = document.getElementById('selesaiBtn').href = link; 
      myModal.toggle();
    }

    function myFunctionDelete(link) {      
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop2'));
      var btn = document.getElementById('selesaiBtn2').href = link; 
      myModal.toggle();
    }
  </script>
@endsection