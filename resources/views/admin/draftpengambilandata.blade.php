@extends('layouts.index')
@section('title', 'Draft Permohonan Pengambilan Data Penelitian')
@section('breadcrumb', 'Draft Permohonan Pengambilan Data Penelitian')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="tab-content">
      <div class="active tab-pane" id="activity">
        <div class="nav-link active" id="activity" role="tabpanel" aria-labelledby="activity">
          <div class="post">
            <div class="user-block">
              <div class="card-body table-responsive">
                <table id="table_id" class="display table shadow table-bordered rounded-1">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama</th>
                      <th scope="col">File Surat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($surat[0]['status_surat']) === true)
                      @foreach ($surat as $item)
                        @if ($item['status_surat'] === 'Selesai')
                          <tr>
                            <th scope="row">{{ $num += 1}}</th>
                            <td>{{ $item['nama'] }}</td>
                            <td>
                            <button onclick="window.open('{{ url( 'draft_surat/pengambilan_data/' . $item->nama_surat) }}', '_blank')" class="btn btn-danger">PDF</button>
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

  </script>
@endsection