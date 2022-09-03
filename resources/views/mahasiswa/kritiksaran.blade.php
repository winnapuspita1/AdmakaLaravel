@extends('layouts.index')
@section('title', 'Kritik & Saran')
@section('breadcrumb', 'Kritik & Saran')

@section('content')
<div class="card">
<div class="card-header">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Isi Kritik & Saran </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
</div>
<div class="mb-1 mx-1">
<td>
<button type="submit" class="btn btn-primary">Simpan</button>
<button type="submit" class="btn btn-outline-primary">Batal</button>
</td>
</div>
</div>
</div>
@endsection 