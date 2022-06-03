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
            <form action="{{ url('alternatif/') }}" method="POST">
            @csrf

            <div class="row">
            
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama">Nama Alternatif</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">

                        @error('nama')
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
                        <label for="criteria_id" name="criteria_id" >{{ $criteria->nama }}</label>
                        
                        <select class="form-control @error('subcriteria_id') is-invalid @enderror"
                        name="subcriteria_id[]">
                        <option value="">--Pilih--</option>
                        @foreach ($criteria->subcriterias as $subcriteria)
                        <option value="{{ $subcriteria->id }}">{{ $subcriteria->namas }}</option>
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