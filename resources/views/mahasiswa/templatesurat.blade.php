@extends('layouts.index')
@section('title', 'Template Surat')
@section('breadcrumb', 'Template Surat')

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
      <th scope="col">File Surat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Surat Persetujuan Sidang Skripsi</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Form Permohonan Sidang Skripsi</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Form Permohonan Seminar Proposal Skripsi</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Surat Persetujuan Seminar Proposal Skripsi</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Form Cuti Akademik</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Borang Laporan Permasalahan SIPA</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Formulir Pengurusan KTM</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
      </td>
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Permohonan Mengikuti MBKM</td>
      <td>
      <a href ="/" class="btn btn-danger"> Cetak</a>
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