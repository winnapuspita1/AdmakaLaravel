@extends('layouts.index')
@section('title', 'Status Surat')
@section('breadcrumb', 'Status Surat')

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
                <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Judul</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Surat Aktif Kuliah</td>
      <td>Selesai, Digital</td>
      <td>
      <a href ="/cekstatus_surat_mahasiswa" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Cek Status</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Transkrip Nilai</td>
      <td>-</td>
      <td>
      <a href ="/cekstatus_surat_mahasiswa" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Cek Status</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Surat Permohonan Magang</td>
      <td>Selesai, Non Digital</td>
      <td>
      <a href ="/cekstatus_surat_mahasiswa" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Cek Status</a>
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