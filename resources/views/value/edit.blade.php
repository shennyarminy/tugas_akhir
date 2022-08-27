@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    {{-- CARD HEADER --}}
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Tambah Data Penilaian</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('value.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <div class="form-group">
                <label for="nama_siswa">Nama siswa</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
                 value="{{ $siswa->nama_siswa }}">
            </div>
          </div>
          {{-- LOOPING UNTUK CRITERIA DAN SUBCRITERIA --}}
          
          @foreach ($criterias as $key => $cri)
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label for="criteria[{{ $cri->id }}]">{{ $cri->nama_criteria }}</label>
              <select class="form-control" id="criteria[{{ $cri->id }}]"
              name="criteria[{{ $cri->id }}]"> 
              @php
                  $nilai = $subcriterias->where('criteria_id', $cri->id)->all();
              @endphp
             
              @foreach ($nilai as $item)
              <option value="{{ $item->id }}"
                {{ $item->id == $perhitungans[$key]->subcriteria_id ? "selected=selected" : "" }}>
                {{ $item->nama_subcriteria }}</option>
              @endforeach

            </select>
            </div>   
          </div>
          @endforeach
        </div> 
        {{-- CARD FOOTER SUBMIT --}}

        <div class="card-footer text-right ml-auto">
          <a href="{{ url('value') }}" class="btn btn-danger float">Batal</a>
          <button type="submit" class="btn btn-primary float success"> Submit</button>
        </div>
      </form>
    </div>
  </div>

</section>


@endsection