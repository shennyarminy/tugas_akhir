@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Tambah Data Kriteria</h4>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="kodekriteria">Kode Kriteria</label>
          <input type="text" class="form-control" id="kodekriteria">
        </div>
        <div class="form-group col-md-6">
          <label for="namaKriteria">Nama Kriteria</label>
          <input type="text" class="form-control" id="namaKriteria">
        </div>
        <div class="form-group col-md-6">
          <label for="bobotKriteria">Bobot Kriteria</label>
          <input type="number" class="form-control" id="bobotKriteria">
        </div>
        <div class="form-group col-md-6">
          <label for="jenisKriteria">Jenis Kriteria</label>
           <select class="custom-select mr-sm-2">   
            <option selected>--Pilih Jenis Kriteria--</option>
            <option value="1">Cost</option>
            <option value="2">Benefit</option>
          </select>
        </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary float-right m-1">Submit</button>
      <button class="btn btn-primary float-right m-1">Reset</button>
    </div>
  </div>
</section>

@endsection


