@extends('layouts.index')
@section('title', 'Register')
@section('breadcrumb', 'Register')

@section('content')
<div class="card m-5">
  <div class="card-header">
    Tambah Akun Baru
    <div class="mt-3 mb-3">
      @if (session('success'))
      <div class="alert alert-success mt-2 mb-2">
          {!! session('success') !!}
      </div>
      @endif
      @if (session('failed'))
          <div class="alert alert-danger mt-2 mb-2">
              {!! session('failed') !!}
          </div>
      @endif
    </div>
    <div class="container">
      <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- Name -->
          <div>
              <x-label for="name" :value="__('Nama')" />

              <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
              @foreach ($errors->get('name') as $msg)
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

              <x-input id="password" class="form-control"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
              @foreach ($errors->get('password') as $msg)
                <p class="text-danger font-size:2px">{{ $msg }}</p>
              @endforeach
          </div>

          <!-- Confirm Password -->
          <div class="mt-4">
              <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />

              <x-input id="password_confirmation" class="form-control"
                              type="password"
                              name="password_confirmation" required />
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

          <div class="container text-start mt-4 mb-4">
              <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
      </form>

    </div>
  </div>
</div>
 @endsection