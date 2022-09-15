@extends('layouts.main')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>{{ $judul }}</h1>
    </div>
    <div class="card">
        {{-- CARD HEADER --}}
        <div class="card-header">
            <i class="fas fa-plus-circle"></i><h4>Tambah Data siswa</h4>
        </div>

        <div class="card-body">
            <form action="{{ url('siswa/') }}" method="POST">
            @csrf

            <div class="row">
            
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}">

                            @error('nama_siswa')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}">

                            @error('nis')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}">

                            @error('nisn')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ old('nama_ayah') }}">

                            @error('nama_ayah')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ old('nama_ibu') }}">

                            @error('nama_ibu')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">

                            @error('alamat')
                            {{ $message }}
                            <div class="invalid-feedback"> 
                            </div>
                            @enderror
                        </div>
                    </div>
                {{-- LOOPING UNTUK CRITERIA DAN SUBCRITERIA --}}
                
                @foreach ($criterias as $criteria)
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="criteria[{{ $criteria->id }}]">{{ $criteria->nama_criteria }}</label>
                        <select class="form-control" id="criteria[{{ $criteria->id }}]"
                        name="criteria[{{ $criteria->id }}]"> 
                        @php
                            $nilai = $subcriterias->where('criteria_id', $criteria->id)->all();
                        @endphp
                        <option value="">--Pilih--</option>
                        @foreach ($nilai as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_subcriteria }} ({{ $item->nilai_subcriteria }})</option>
                        @endforeach
                    </select>
                    </div>   
                </div>
                @endforeach
            </div> 

                {{-- CARD FOOTER SUBMIT --}}

                <div class="card-footer text-right ml-auto">
                    <a href="{{ url('siswa') }}" class="btn btn-danger float">Batal</a>
                    <button type="submit" class="btn btn-primary float success"> Submit</button>

                </div>
            </form>
        </div>
    </div>

</section>


@endsection