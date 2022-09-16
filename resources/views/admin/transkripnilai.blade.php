@extends('layouts.index')
@section('title', 'Transkrip Nilai Sementara')
@section('breadcrumb', 'Transkrip Nilai Sementara')

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
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
      <a href ="#" class="btn btn-success"> Selesai </a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
      <a href ="#" class="btn btn-success"> Selesai </a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lusy</td>
      <td>
      <a href ="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
      <a href ="#" class="btn btn-success"> Selesai </a>
      </td>
    </tr>
  </tbody>
</table>
                </div>
            </div>          
            </div>
          </div>

          <!-- Menu Diterima -->
          <div class="active tab-pane" id="settings">
          <div class="nav-link active" id="settings" role="tabpanel" aria-labelledby="settings">
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
      <a href ="#" class="btn btn-info"> Forward </a>
      <a href ="#" class="btn btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
      <a href ="#" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>
      <a href ="#" class="btn btn-info"> Forward </a>
      <a href ="#" class="btn btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
      <a href ="#" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lusy</td>
      <td>
      <a href ="#" class="btn btn-info"> Forward </a>
      <a href ="#" class="btn btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
      <a href ="#" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </a>
      </td>
    </tr>
  </tbody>
</table>
                </div>
            </div>          
            </div>
          </div>


@endsection