@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('result.cetak') }}" target="_blank" title="Cetak Data" class="btn btn-primary ml-auto">Cetak Data</a>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>DATA HASIL AKHIR</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped display">
          <thead>
            <tr>
                <th>Rank</th>
                <th>siswa</th>
                <th>Ranking</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($optimization as $opt => $val)
            <tr>
                <td>{{ $rank++ }}</td>
                <td>{{ $siswa[$opt][0] }}</td>
            
                <td>{{ number_format((float)$optimization[$opt], 4, '.', '') }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function(){
    $('table.display').DataTable({
      "paging":   false,
      "ordering": false,
      "info":     false,
      "searching" : false,
    })
  })
</script>
  



@endsection



