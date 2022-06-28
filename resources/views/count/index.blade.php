@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Perhitungan</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            
                
            <tr>
              <th class="col-1">No.</th>
              <th class="col-4">Nama Alternatif</th>
              @foreach ($criterias as $criteria)
                <th>{{ $criteria->nama }}</th>
              @endforeach
              <th class="col-4"></th>
        
            </tr>
          </thead>
          <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $alternatif->nama }}</td>
                  @foreach ($alternatif->subcriterias as $subcriteria)
                    <td>{{ $subcriteria->namas }}</td>
                  @endforeach
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

</section>





@endsection



