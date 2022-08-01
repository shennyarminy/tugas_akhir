@extends('layouts.main')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>{{ $judul }}</h1>
    </div>
    <div class="card">
        {{-- CARD HEADER --}}
        <div class="card-header">
            <i class="fas fa-plus-circle"></i><h4>Tambah Data Alternatif</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('alternatif.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_alternatif">Nama Alternatif</label>
                            <input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control @error('nama_alternatif') is-invalid @enderror" value="{{ old('nama_alternatif') }}">

                            @error('nama_alternatif')
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
                            <label for="criteria[{{ $criteria->id }}]">{{ $criteria->nama_criteria }}({{ $criteria->kode }})</label>
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
                    <a href="{{ url('alternatif') }}" class="btn btn-danger float">Batal</a>
                    <button type="submit" class="btn btn-primary float success"> Submit</button>

                </div>
            </form>
        </div>
    </div>

</section>


@endsection