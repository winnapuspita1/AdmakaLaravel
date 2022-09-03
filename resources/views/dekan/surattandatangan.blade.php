@extends('layouts.index')
@section('title', 'Surat Yang Harus Ditandatangani')
@section('breadcrumb', 'Surat Tandatangan')

@section('content')
<div class="card">
<div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Surat</th>
      <th scope="col">Akses</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Surat Aktif Kuliah</td>
      <td>
      <a href ="/tandatangan_dekan" class="btn btn-outline-primary"><i class="nav-icon fas fa-marker"></i> Tandatangan Surat</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Surat Permohonan Magang</td>
      <td>
      <a href ="/tandatangan_dekan" class="btn btn-outline-primary"><i class="nav-icon fas fa-marker"></i> Tandatangan Surat</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Transkrip Nilai Sementara</td>
      <td>
      <a href ="/tandatangan_dekan" class="btn btn-outline-primary"><i class="nav-icon fas fa-marker"></i> Tandatangan Surat</a>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection