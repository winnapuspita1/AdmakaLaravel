@extends('layouts.index')
@section('title', 'Kritik & Saran')
@section('breadcrumb', 'Kritik & Saran')

@section('content')
<div class="card">
<div class="card-header">
  <form action="{{url('save-kritik-saran')}}" method="POST">
@csrf

<div class="mb-3">

    @if(session('failed'))
      <div class="alert alert-danger mt-2 mb-2">
        {!! session('failed') !!}
      </div>
    @endif 
  <label for="exampleFormControlTextarea1" class="form-label">Isi Kritik & Saran </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="kritik_saran"></textarea>
  @foreach($errors->get('kritik_saran') as $msg)
    <p class="text-danger font-size:2px">{{ $msg }}</p>
  @endforeach
</div>
<div class="mb-1 mx-1">
<td>
<button type="submit" class="btn btn-primary">Simpan</button>
<button type="submit" class="btn btn-outline-primary">Batal</button>
</td>
</div>
</form>
</div>
</div>

<!-- Modal Selesai-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-2">
  
      <div class="modal-body mx-auto">
        <h5>Data Ditambahkan!</h5>
      </div>
      <div class="mx-auto mb-3">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script>
  myFunction();
    function myFunction() {
      var isSuccess = @if(session('success')) true @else false @endif;
      if(isSuccess){
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.toggle();
      }
    }

  </script>
@endsection