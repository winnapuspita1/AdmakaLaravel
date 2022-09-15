@extends('layouts.index')
@section('title', 'Kritik & Saran')
@section('breadcrumb', 'Kritik & Saran')

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
      <th scope="col">Nama Pengguna</th>
      <th scope="col">Kritik dan Saran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Mantap pelayanannya</td>
      <td>
      <a href ="" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Sangat baik</td>
      <td>
      <a href ="" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lusy</td>
      <td>Proses cepat</td>
      <td>
      <a href ="" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete</a>
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