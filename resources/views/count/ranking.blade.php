@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>HASIL AKHIR</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
                <th>Rank</th>
                <th>Alternatif</th>
                <th>Optimasi</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($optimization as $opt => $val)
            <tr>
                <td>{{ $rank++ }}</td>
                <td>{{ $alternatif[$opt][0] }}</td>
                <td>{{ number_format((float)$optimization[$opt], 4, '.', '') }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</section>



@endsection



