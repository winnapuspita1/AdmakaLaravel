@extends('layouts.index')
@section('title', 'Status Surat')
@section('breadcrumb', 'Status Surat')

@section('content')
<div class="card">
      <div class="card-body">
        <div class="tab-content">
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
          <div class="active tab-pane" id="activity">
            <div class="nav-link active" id="activity" role="tabpanel" aria-labelledby="activity">
              <div class="post">
                <div class="user-block">
                  <div class="card-body table-responsive">
                  <table id="table_id" class="display table shadow table-bordered rounded-1">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis Surat</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">File Surat</th>
                      </tr>
                    </thead>
                    <tbody>  
                      @if (isset($aktif_kuliah))
                          @foreach ($aktif_kuliah as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Aktif Kuliah</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Aktif Kuliah</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Aktif Kuliah</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/aktif_kuliah/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                      @endif
                      @if (isset($kp))
                          @foreach ($kp as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat KP</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat KP</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat KP</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/kp/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                      @endif
                      @if (isset($magang))
                          @foreach ($magang as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Magang</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Magang</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Magang</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/magang/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                      @endif
                      @if (isset($pengambilan_data))
                          @foreach ($pengambilan_data as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Pengambilan Data Penelitian</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Pengambilan Data Penelitian</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Pengambilan Data Penelitian</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/pengambilan_data/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                      @endif
                      @if (isset($transkrip_nilai))
                          @foreach ($transkrip_nilai as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Transkrip Nilai</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Transkrip Nilai</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Transkrip Nilai</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/transkrip_nilai/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                      @endif
                      @if (isset($rekomendasi))
                          @foreach ($rekomendasi as $item)
                            @if ($item['status_surat'] === 'Diterima')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Rekomendasi</td>
                                <td>
                                <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Proses Pengerjaan')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Rekomendasi</td>
                                <td>
                                <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
                                </td>
                                <td>
                                <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
                                </td>
                              </tr>
                            @elseif ($item['status_surat'] === 'Selesai')
                              <tr>
                                <th scope="row">{{$number += 1}}</th>
                                <td>Surat Rekomendasi</td>
                                <td>
                                <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
                                </td>
                                <td>
                                <a href ="{{url('surat-mahasiswa/rekomendasi/'.$item['nama_surat'])}}" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
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