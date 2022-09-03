@extends('layouts.index')
@section('title', 'Surat Selesai')
@section('breadcrumb', 'Surat Selesai')

@section('content')
<div class="card">
<div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Surat</th>
      <th scope="col">Keterangan Surat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Surat Aktif Kuliah</td>
      <td>Selesai, Non Digital</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Surat Permohonan Magang</td>
      <td>Selesai, Digital</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Transkrip Nilai Sementara</td>
      <td>Selesai, Digital</td>
    </tr>
  </tbody>
</table>
</div>
@endsection