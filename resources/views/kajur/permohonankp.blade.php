@extends('layouts.index')
@section('title', 'Permohonan KP')
@section('breadcrumb', 'Permohonan KP')

@section('content')
<div class="card">
<div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Simar</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat</a>
      <a href ="#" class="btn btn-info"> Forward</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Dini</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat</a>
      <a href ="#" class="btn btn-info"> Forward</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Hikma</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat</a>
      <a href ="#" class="btn btn-info"> Forward</a>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection