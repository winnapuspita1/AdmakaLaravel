@extends('layouts.index')
@section('title', 'Manajemen Akun')
@section('breadcrumb', 'Manajemen Akun')

@section('content')
<style>
  tr td {
      max-width: 100%;
      white-space: nowrap;
  }
</style>

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

        <div class="card-body">
            <div class="">
                <div class="" style="overflow:auto">
                    <table id="table_id" class="display table shadow table-bordered rounded-1" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            @if (isset($item['id']))
                            {{-- untuk index role pada form edit data --}}
                            @php 
                            $role = '';
                            if ($item['role'] === 'superadmin')
                                $role = 1;
                            elseif ($item['role'] === 'admin')
                                $role = 2;
                            else
                                $role = 3;
                            @endphp

                            <tr>
                                <th scope="row">{{ $number+=1 }}</th>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['nomor_hp']}}</td>
                                <td>{{ $item['role'] }}</td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#" onclick="editForm('{{$item['id']}}', '{{$item['name']}}','{{$item['email']}}','{{$role}}','{{$item['nomor_hp']}}')">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="myFunctionDelete('{{ url('hapus-akun/'.$item['id']) }}')">Hapus Akun</a></li>
                                    </ul>
                                </div>
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


<!-- Modal Edit-->
<div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabelEdit">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('update-akun') }}" id="update-akun">
            @csrf
            <input type="hidden" id="id_user" name="id">
  
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama')" />
  
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                @foreach ($errors->get('name') as $msg)
                <p class="text-danger font-size:2px">{{ $msg }}</p>
            @endforeach
            </div>
  
            <!-- Nomor Hp -->
            <div>
              <x-label for="nomor_hp" :value="__('nomor_hp')" />

              <x-input id="nomor_hp" class="form-control" type="text" name="nomor_hp" :value="old('nomor_hp')" required autofocus />
              @foreach ($errors->get('nomor_hp') as $msg)
                  <p class="text-danger font-size:2px">{{ $msg }}</p>
              @endforeach
          </div>
  
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
  
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                @foreach ($errors->get('email') as $msg)
                <p class="text-danger font-size:2px">{{ $msg }}</p>
            @endforeach
            </div>
  
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
  
                <x-input id="password" class="form-control" placeholder="Harap Kosongkan Jika Tidak Ingin Ganti Password!!"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
                @foreach ($errors->get('password') as $msg)
                  <p class="text-danger font-size:2px">{{ $msg }}</p>
                @endforeach
            </div>
  
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />
  
                <x-input id="password_confirmation" class="form-control"  placeholder="Harap Kosongkan Jika Tidak Ingin Ganti Password!!"
                                type="password"
                                name="password_confirmation"  />
            </div>
  
            <!-- Role -->
            <div class="mt-4">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-select">
                <option selected>Pilih Role Akun</option>
                <option value="superadmin">Super Admin</option>
                <option value="admin">Admin</option>
                <option value="mahasiswa">Mahasiswa</option>
              </select>
              @foreach ($errors->get('role') as $msg)
                <p class="text-danger font-size:2px">{{ $msg }}</p>
              @endforeach
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="update-akun" class="btn btn-success">Simpan Data</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete-->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus akun pengguna?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a id="selesaiBtn2" href="" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
  <script>
    $(document).ready( function () {
        $('#table_id').DataTable({
          "pageLength": 15,
          "lengthChange": false,
          "columnDefs": [
            { "searchable": false, "targets": 0 }
          ]
        });
    } );
    
    function editForm(id,nama,email,role,no_hp) { 
        document.getElementById("id_user").value = id;
        document.getElementById("name").value = nama;
        document.getElementById("email").value = email;
        document.getElementById("nomor_hp").value = no_hp;
        document.getElementById('role').selectedIndex = role;
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdropEdit'));
        myModal.toggle();
    }

    function myFunctionDelete(link) {      
      var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop2'));
      var btn = document.getElementById('selesaiBtn2').href = link; 
      myModal.toggle();
    }
    
  </script>
@endsection