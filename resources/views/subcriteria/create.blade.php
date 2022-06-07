@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
      <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
        <i class="fas fa-plus-circle"></i><h4>Tambah Data Subriteria</h4>
    </div>
  <div class="card-body">
    <form action="{{ url('subcriteria') }}" method="POST">
      @csrf
      <div class="row">
          <div class="col-12 col-lg-6">
              <label for="namas">Nama Subkriteria</label>
              <input type="text" name="namas" id="namas" class="form-control @error('namas') is-invalid @enderror" value="{{ old('namas') ?? $subcriteria->namas ?? '' }}">
              @error('namas')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
      
          <div class="col-12 col-lg-6">
              <div class="form-group">
                  <label for="nilai">Nilai Subkriteria</label>
                  <input type="number" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror" value="{{ old('nilai') }}">
                  @error('nilai')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="col-12 col-lg-6">
              <div class="form-group">
                  <label for="criteria_id">Kriteria</label>
                  <select name="criteria_id" id="criteria_id" class="form-control @error('criteria_id') is-invalid @enderror">
                      <option value="">--Pilih Kriteria--</option>
                      @foreach ($criterias as $criteria)
                      <option value="{{ $criteria->id }}">{{ $criteria->nama }}</option>
                      @endforeach

                      @error('criteria_id')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </select>
              </div>
          </div>
      </div>

      {{-- CARD-FOOTER --}}
      <div class="card-footer text-right">
          <a href="{{ url('subcriteria') }}" class="btn btn-danger float">Batal</a>
          <button type="submit" class="btn btn-primary float success"> Submit</button>

      </div>
    </form>
  </div>
  </div>
</section>

@endsection