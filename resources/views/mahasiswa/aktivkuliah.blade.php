@extends('layouts.index')
@section('title', 'Aktif Kuliah')
@section('breadcrumb', 'Aktif Kuliah')

@section('content')
<!-- Main content -->
<div class="card">
  <div class="card-header">
    SURAT AKTIF KULIAH
  <div class="container">
  <form action="{{url('save-surat-aktif-kuliah')}}" method="POST">
  @csrf
  <div class="mb-3 mx-3">

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
    <label for="InputKeperluan" class="form-label">Keperluan</label>
    <input type="keperluan" class="form-control" id="InputKeperluan" name="keperluan">
    @foreach($errors->get('keperluan') as $msg)
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