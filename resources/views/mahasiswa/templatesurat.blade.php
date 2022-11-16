@extends('layouts.index')
@section('title', 'Template Surat')
@section('breadcrumb', 'Template Surat')

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
                                                <th scope="col">Jenis Surat</th>
                                                <th scope="col">File Surat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Surat Persetujuan Sidang Skripsi</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/BO.FT.01_SURAT_PERSETUJUAN_SIDANG_SKRIPSI.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Form Permohonan Sidang Skripsi</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/BO.FT.02 FORM PERMOHONAN SIDANG SKRIPSI.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Form Permohonan Seminar Proposal Skripsi</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/BO.FT.03 FORM PERMOHONAN SEMINAR PROPOSAL SKRIPSI.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Surat Persetujuan Seminar Proposal Skripsi</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/BO.FT.04 SURAT PERSETUJUAN SEMINAR PROPOSAL SKRIPSI.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Form Cuti Akademik</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/Borang Pengurusan Mahasiswa Cuti_Pindah.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Borang Laporan Permasalahan SIPA</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/Borang Permasalahan SIPA.pdf') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Formulir Pengurusan KTM</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/FORMULIR PENGURUSAN KTM.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Permohonan Mengikuti MBKM</td>
                                                <td>
                                                    <a href="{{ url('FORM_AKADEMIK/PERMOHONAN MENGIKUTI KEGIATAN MBKM.docx') }}"
                                                        class="btn btn-danger"> Cetak</a>
                                                </td>
                                            </tr>
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
