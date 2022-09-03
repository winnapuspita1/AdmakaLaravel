@extends('layouts.index')
@section('title', 'Permohonan Magang')
@section('breadcrumb', 'Permohonan Magang')

@section('content')

<div>
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Belum Diterima</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Diterima</a></li>
        </ul>
      </div><!-- /.card-header -->

      <div class="card-body">
        <div class="tab-content">

          <!-- Menu Belum Diterima -->
          <div class="active tab-pane" id="activity">
          <div class="nav-link active" id="activity" role="tabpanel" aria-labelledby="activity">
            <div class="post">
              <div class="user-block">
                <div class="card-body table-responsive">
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
      <button type="button" class="btn btn-outline-success">Lihat</button>
      <button type="button" class="btn btn-success">Selesai</button>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>
      <button type="button" class="btn btn-outline-success">Lihat</button>
      <button type="button" class="btn btn-success">Selesai</button>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lusy</td>
      <td>
      <button type="button" class="btn btn-outline-success">Lihat</button>
      <button type="button" class="btn btn-success">Selesai</button>
      </td>
    </tr>
  </tbody>
</table>
                </div>
            </div>          
            </div>
          </div>


@endsection