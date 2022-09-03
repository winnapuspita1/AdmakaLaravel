@extends('layouts.index')
@section('title', 'Aktif Kuliah')
@section('breadcrumb', 'Aktif Kuliah')

@section('content')
<!-- Main content -->
<div class="card">
  <div class="card-header">
    SURAT AKTIF KULIAH
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
    <label for="InputKeperluan" class="form-label">Keperluan</label>
    <input type="keperluan" class="form-control" id="InputKeperluan">
  </div>
  <div class="mb-3 mx-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
 </form>
 </div>
 </div>
 @endsection