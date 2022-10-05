@extends('layouts.index')
@section('title', 'Status Surat')
@section('breadcrumb', 'Status Surat')

@section('content')
<div class="card">
      <div class="card-body">
        <div class="tab-content">

          <div class="active tab-pane" id="activity">
          <div class="nav-link active" id="activity" role="tabpanel" aria-labelledby="activity">
            <div class="post">
              <div class="user-block">
                <div class="card-body table-responsive">
                <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Jenis Surat</th>
      <th scope="col">Keterangan</th>
      <th scope="col">File Surat</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>Surat Aktif Kuliah</td>
      <td>
      <a href ="#" class="btn btn-outline-success"><i class="nav-icon fas fa-check"></i> Selesai</a>
      </td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Surat Permohonan KP</td>
      <td>
      <a href ="#" class="btn btn-outline-info"><i class="nav-icon fas fa-spinner"></i> Proses</a>
      </td>
      <td>
      <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Surat Permohonan Magang</td>
      <td>
      <a href ="#" class="btn btn-outline-dark"><i class="nav-icon fas fa-arrow-down"></i> Diterima</a>
      </td>
      <td>
      <a href ="#" class="btn btn-primary disabled"><i class="nav-icon fas fa-download"></i> Cetak</a>
      </td>
    </tr>
  </tbody>
</table>
                </div>
            </div>          
            </div>
          </div>
          </div>
@endsection