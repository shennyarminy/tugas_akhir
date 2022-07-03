@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    {{-- CARD HEADER --}}
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Ubah Data Subriteria</h4>
    </div>

    <div class="card-body">
      <form action="{{ url('subcriteria/'. $subcriteria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="method" value="PATCH">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="nama_subcriteria">NAMA SUBKRITERIA</label>
              <input type="text" name="nama_subcriteria" id="nama_subcriteria" class="form-control" value="{{ $subcriteria->nama_subcriteria }}">
            </div>
          </div>
         
          
      
          <div class="col-12 ">
            <div class="form-group">
              <label for="nilai_subcriteria">NILAI SUBKRITERIA</label>
              <input type="number" min="1" max="5" name="nilai_subcriteria" id="nilai_subcriteria" class="form-control" value="{{ $subcriteria->nilai_subcriteria }}">
            </div>   
          </div>
          <div class="col-12 ">
            <div class="form-group">
                <label for="criteria_id">KRITERIA</label>
                <select name="criteria_id" id="criteria_id" class="form-control @error('criteria_id') is-invalid @enderror">
                    @foreach ($criterias as $criteria)
                    <option value="{{ $criteria->id }}">{{ $criteria->nama_criteria }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div> 
        {{-- CARD FOOTER SUBMIT --}}

        <div class="card-footer text-right">
          <a href="{{ url('subcriteria') }}" class="btn btn-danger float">Batal</a>
          <button type="submit" class="btn btn-primary float success"> Submit</button>
        </div>
      </form>
    </div>
  </div>

</section>


@endsection