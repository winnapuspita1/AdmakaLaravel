@extends('layouts.index')
@section('title', 'Draft Permohonan Kerja Praktek')
@section('breadcrumb', 'Draft Permohonan Kerja Praktek')

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
      <th scope="col">Nama</th>
      <th scope="col">File Surat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
      <a href ="/" class="btn btn-danger"> PDF</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>
      <a href ="/" class="btn btn-danger"> PDF</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lucy</td>
      <td>
      <a href ="/" class="btn btn-danger"> PDF</a>
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