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
    </div>

    <div class="card-body">
        <form action="{{ url('subcriteria/') }}" method="post">
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
                        <label for="nilai">Nilai Subkriteria</label>
                        <input type="text" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror" value="{{ old('nilai') ?? $subcriteria->nilai ?? '' }}">

                        @error('nilai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer tet-right">
                    <a href="{{ url('subcriteria') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary success">Submit</button>
                </div>
        
        </form>
    </div>


</section>

@endsection