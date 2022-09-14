@extends('layouts.index')
@section('title', 'Permohonan Magang')
@section('breadcrumb', 'Permohonan Magang')

@section('content')
<!-- Main content -->
<div class="card">
  <div class="card-header">
    SURAT PERMOHONAN MAGANG
  <div class="container">
  <form action="{{url('save-surat-magang')}}" method="POST">
  <div class="mb-3 mx-3">
    @csrf
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
 <label for="InputNamaLengkap" class="form-label">Nama Lengkap</label>
    <input type="nama" class="form-control" id="InputNamaLengkap" name="nama">
    @foreach($errors->get('nama') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputNim" class="form-label">NIM</label>
    <input type="nim" class="form-control" id="InputNim" name="nim">
    @foreach($errors->get('nim') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputProgramStudi" class="form-label">Program Studi</label>
    <input type="programstudi" class="form-control" id="InputProgramStudi" name="program_studi">
    @foreach($errors->get('program_studi') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTempatLahir" class="form-label">Tempat Lahir</label>
    <input type="tempatlahir" class="form-control" id="InputTempatLahir" name="tempat_lahir">
    @foreach($errors->get('tempat_lahir') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalLahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="InputTanggalLahir" name="tanggal_lahir">
    @foreach($errors->get('tanggal_lahir') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTujuanSurat" class="form-label">Tujuan Surat</label>
    <input type="tujuansurat" class="form-control" id="InputTujuanSurat" name="tujuan_surat">
    @foreach($errors->get('tujuan_surat') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputAlamatSurat" class="form-label">Alamat Surat</label>
    <input type="alamatsurat" class="form-control" id="InputAlamatSurat" name="alamat_surat">
    @foreach($errors->get('alamat_surat') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalMulai" class="form-label">Tanggal Mulai</label>
    <input type="date" class="form-control" id="InputTanggalMulai" name="tanggal_mulai">
    @foreach($errors->get('tanggal_mulai') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalSelesai" class="form-label">Tanggal Selesai</label>
    <input type="date" class="form-control" id="InputTanggalSelesai" name="tanggal_selesai">
    @foreach($errors->get('tanggal_selesai') as $msg)
     <p class="text-danger font-size:2px">{{ $msg }}</p>
    @endforeach
  </div>
  <div class="mb-3 mx-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
 </form>
 </div>
 </div>
 @endsection