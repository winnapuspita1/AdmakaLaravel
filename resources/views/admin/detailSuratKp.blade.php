@extends('layouts.index')
@section('title', 'Surat KP')
@section('breadcrumb', 'Surat KP')

@section('content')
<div>
    <div class="card">
        <div class="p-2">
            <a class="btn btn-primary btn-sm" href="{{ url('permohonan_kp') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Kembali
            </a>
        </div>
      <div class="card-body">
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
        <div class="p-3">
            <h5 class="mb-3">Surat KP</h5>
            <div class="card shadow-lg p-5">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <p id='nama'>: {{$data[0]['nama']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2">NIM</label>
                    <div class="col-sm-10">
                        <p id="nim">: {{$data[0]['nim']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ps" class="col-sm-2">Program Studi</label>
                    <div class="col-sm-10">
                        <p id="ps">: {{$data[0]['program_studi']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tel" class="col-sm-2">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <p id="tel">: {{$data[0]['tempat_lahir']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tal" class="col-sm-2">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <p id="tal">: {{$data[0]['tanggal_lahir']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="als" class="col-sm-2">Alamat Surat</label>
                    <div class="col-sm-10">
                        <p id="als">: {{$data[0]['alamat_surat']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tus" class="col-sm-2">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <p id="tus">: {{$data[0]['tujuan_surat']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tam" class="col-sm-2">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <p id="tam">: {{$data[0]['tanggal_mulai']}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tas" class="col-sm-2">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <p id="tas">: {{$data[0]['tanggal_selesai']}}</p>
                    </div>
                </div>
                <form action="{{url('save-surat-kp-admin')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="formFile" class="col-sm-2">Upload File (pdf/docx)</label>
                            <div class="col-sm-10">
                                <p id="formFile">: {{$data[0]['nama_surat']}}</p>
                            </div>
                    </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{$data[0]['id']}}">
                            <input type="hidden" name="nim" value="{{$data[0]['nim']}}">                            
                            <input class="form-control" type="file" id="" name="dokumen">
                        </div>
                        <div class="">
                            @if ($edit === false)
                                <button type="submit" class="btn btn-primary">Upload File</button>
                            @else
                                <button type="submit" class="btn btn-primary">Edit File</button>
                            @endif
                            <a class="btn btn-success" href="{{url('preview_draft_surat/kp/'.$data[0]['id'])}}">Preview Draft</a>
                        </div>
                    
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection