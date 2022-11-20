@extends('layouts.index')
@section('title', 'Kritik & Saran')
@section('breadcrumb', 'Kritik & Saran')

@section('content')
<div class="card">
      <div class="card-body">
        <div class="tab-content">

          <!-- Menu Belum Diterima -->
          <div class="active tab-pane" id="activity">
            <div class="nav-link active" id="activity" role="tabpanel" aria-labelledby="activity">
              <div class="post">
                <div class="user-block">
                  <div class="card-body table-responsive">
                    <table id="table_id" class="table">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Nama Pengguna</th>
                          <th scope="col">Kritik dan Saran</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                          <tr>
                            <th scope="row">{{$number+=1}}</th>
                            <td>{{$item['nama']}}</td>
                            <td>{!! $item['kritik_saran'] !!}</td>
                            <td>
                            <a onclick="myFunctionDelete('{{url('delete_kritik_saran_admin/'.$item['id'])}}')" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete</a>
                            </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
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
    
    function myFunctionDelete(link) {      
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop2'));
      var btn = document.getElementById('selesaiBtn2').href = link; 
      myModal.toggle();
    }
  </script>
@endsection