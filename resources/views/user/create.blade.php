@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>

<div class="card">
  <div class="card-header">
    <i class="fas fa-plus-circle"></i><h4>Tambah Data User</h4>
  </div>
  <div class="card-body">
    <form action="{{ url('user') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" autofocus>
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="username">Username</label>
          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" autofocus>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="password" class="d-block">Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwstrength" value="{{ old('password') }}" data-indicator="pwindicator" name="password">
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
            </div>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="roles" class="form-label">Level</label>
            <select name="roles" class="form-control">
                <option value="" disabled selected>-- Pilih --</option>
                <option value="ADMIN" {{ old('roles') == 'ADMIN'? 'selected' : '' }}
                    >ADMIN
                </option>
                <option value="DM" {{ old('roles') == 'DM' ? 'selected' : '' }}
                    >DM
                </option>
                @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </select>
        </div>
      </div>
    </div>

    <div class="card-footer text-right">
      <a href="{{ url('user') }}" class="btn btn-danger float">Batal</a>
      <button type="submit" class="btn btn-primary float success" data-nama="{{ $user->nama }}" >Submit</button>
    </div>
    </form>
  </div>
</div>
</section>
@endsection