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
      <form action="{{ url('user/'.$user->id) }}" method="post">
      @csrf
      @method('PUT')
      <input type="hidden" name="method" value="PATCH">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama" class="form-control" value="{{ $user->nama }}">
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control" value="{{ $user->username }}">
          </div>
        </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" class="form-control" value="{{ $user->password }}"  >
           
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