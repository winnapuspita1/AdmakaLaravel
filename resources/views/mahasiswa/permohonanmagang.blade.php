@extends('layouts.index')
@section('title', 'Permohonan Magang')
@section('breadcrumb', 'Permohonan Magang')

@section('content')
<!-- Main content -->
<div class="card">
  <div class="card-header">
    SURAT PERMOHONAN MAGANG
  <div class="container">
  <form>
  <div class="mb-3 mx-3">
    <label for="InputNamaLengkap" class="form-label">Nama Lengkap</label>
    <input type="nama" class="form-control" id="InputNamaLengkap">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputNim" class="form-label">NIM</label>
    <input type="nim" class="form-control" id="InputNim">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputProgramStudi" class="form-label">Program Studi</label>
    <input type="programstudi" class="form-control" id="InputProgramStudi">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTempatLahir" class="form-label">Tempat Lahir</label>
    <input type="tempatlahir" class="form-control" id="InputTempatLahir">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalLahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="InputTanggalLahir">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTujuanSurat" class="form-label">Tujuan Surat</label>
    <input type="tujuansurat" class="form-control" id="InputTujuanSurat">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputAlamatSurat" class="form-label">Alamat Surat</label>
    <input type="alamatsurat" class="form-control" id="InputAlamatSurat">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalMulai" class="form-label">Tanggal Mulai</label>
    <input type="date" class="form-control" id="InputTanggalMulai">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputTanggalSelesai" class="form-label">Tanggal Selesai</label>
    <input type="date" class="form-control" id="InputTanggalSelesai">
  </div>
  <div class="mb-3 mx-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
 </form>
 </div>
 </div>
 @endsection