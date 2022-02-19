@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4> Tambah Data Kriteria</h4>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Kode Kriteria</label>
          <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nama Kriteria</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Bobot Kriteria</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Jenis Kriteria</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary float-right m-1">Submit</button>
      <button class="btn btn-primary float-right m-1">Reset</button>
    </div>
  </div>
</section>

@endsection


