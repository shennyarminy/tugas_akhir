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
            
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama_siswa">Nama siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}">

                        @error('nama_siswa')
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