@extends('layouts.index')
@section('title', 'Aktif Kuliah')
@section('breadcrumb', 'Aktif Kuliah')

@section('content')
<div>
    <div class="card">
      @if(session('success'))
      <div class="alert alert-success mt-2 mb-2">
          {!! session('success') !!}
      </div>
      @endif 
      @if(session('failed'))
      <div class="alert alert-danger mt-2 mb-2">
          {!! session('failed') !!}
      </div>
      @endif
      <div class="card-header p-2">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-belum-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-belum-diterima" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Belum Diterima</button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-diterima-tab" data-bs-toggle="pill" data-bs-target="#pills-diterima" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Diterima</button>
          </li>
      </ul>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <div class="tab-content">
          <div class="tab-content mt-5" id="pills-tabContent">
            <!-- Menu Belum Diterima -->
            <div class="tab-pane fade show active" id="pills-belum-diterima" role="tabpanel" aria-labelledby="pills-belum-diterima-tab">
                <div class="ps-5 pe-5">
                    <div class="ps-5 pe-5">
                        <table id="penjualan" class="display table shadow table-bordered rounded-1" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $item)
                            @php
                                $status = ((isset($item['status_surat']) === true) ? 'Selesai': 'Belum Selesai');
                            @endphp
                              @if ($status === "Belum Selesai")
                                <tr>
                                  <th scope="row">{{ $number+=1 }}</th>
                                  <td>{{ $item['nama'] }}</td>
                                  <td>
                                  <a href ="{{url('detail_surat_aktif_kuliah/'.$item['id'])}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat </a>
                                  <a href ="{{url('status_surat/aktif_kuliah/'.$item['id'])}}" class="btn btn-success"> Selesai </a>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Menu Diterima -->
            <div class="tab-pane fade" id="pills-diterima" role="tabpanel" aria-labelledby="pills-diterima-tab">
                <div class="ps-5 pe-5">
                    <div class="ps-5 pe-5">
                        <table id="penitipan" class="display table shadow table-bordered rounded-1" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $number = 0;
                            @endphp
                            @foreach ($data as $item)
                            @php
                                $status = ((isset($item['status_surat']) === true) ? 'Selesai': 'Belum Selesai');
                            @endphp
                              @if ($status === "Selesai")
                                <tr>
                                  <th scope="row">{{ $number+=1 }}</th>
                                  <td>{{ $item['nama'] }}</td>
                                  <td>
                                    <a href ="#" class="btn btn-info"> Forward </a>
                                    <a href ="{{url('detail_surat_aktif_kuliah/'.$item['id'].'/true')}}" class="btn btn-warning"><i class="nav-icon fas fa-pen"></i> Edit </a>
                                    <a href ="{{url('hapus_surat/aktif_kuliah/'.$item['id'])}}" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Delete </a>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection