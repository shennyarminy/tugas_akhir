@extends('layouts.main')
@section('content')


<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>

  {{-- PENGULANGAN UNTUK CARD TABEL KRITERIA --}}
  @foreach ($criterias as $criteria)

  <div class="card">

    {{-- CARD HEADER --}}
    <div class="card-header">
      <i class="fas fa-table"></i><h4 value="{{ $criteria->id }}" name="$criteria_id">{{ $criteria->nama }}</h4>
      <div class="card-header-action">
        <a href="{{ url('subcriteria/create') }}" title="Tambah Subkriteria" class="btn btn-success col-auto">Tambah Subkriteria</a>
      </div>
    </div>
    
{{-- TABLE --}}
    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
              <th class="col-1">No.</th>
              <th class="col-3">Nama Subkriteria</th>
              <th class="col-2">Nilai Subkriteria</th>
              <th class="col-2">Aksi</th>
             
            </tr>
          </thead>
          <tbody>
            {{-- FOREACH UNTUK SUBCRITERIA --}}
            @foreach ($subcriterias as $subcriteria)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $subcriteria->nama }}</td>
                  <td>{{ $subcriteria->nilai }}</td>
               
                </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
  @endforeach
</section>

@endsection