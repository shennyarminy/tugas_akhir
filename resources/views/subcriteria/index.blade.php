
@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>
 
  

  <div class="card">   
      {{-- CARD HEADER TAMBAH DATA KRITERIA--}}
      <div class="card-header">
          <i class="fas fa-plus"></i><h4>Data Subkriteria</h4>
          <div class="card-header-action">
              <a href=" {{ url('subcriteria/create') }}" title="Tambah Kriteria" class="btn btn-success col-auto"> Tambah Subkriteria</a>
            </div>
        </div>
     

                                    
    {{-- CARD BODY --}}
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-1" class="table table-striped">
            <thead>
              <tr>
                <th class="col-1">No.</th>
                <th class="col-2">Nama Sub Kriteria</th>
                <th class="col-2">Nilai</th>
                <th class="col-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subcriterias as $subcriteria)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subcriteria->$criteria->nama }}</td>
                    <td>{{ $subcriteria->nilai }}</td>
                </tr>
                    
                @endforeach
            </tbody>

          </table>
        </div>
      </div> 
    </div>
  </div>

</section>


@endsection