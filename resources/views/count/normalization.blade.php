@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>NORMALISASI</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped display">
          <thead>
            <tr>
                <th>No</th>
                <th>siswa</th>
                {{-- <th>Name</th> --}}
                @foreach (array_keys(current($matrix)) as $indexCriteria )
                <th>C{{$indexCriteria}}</th>
                
                
                @endforeach
               
            </tr>
        </thead>
        <tbody>
            @foreach (array_keys($matrix) as $indexsiswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>A{{$indexsiswa}}</td>
                @foreach (array_keys($matrix[$indexsiswa]) as $indexCriteria)
                  <td>{{ number_format((float)$normalization[$indexsiswa][$indexCriteria], 4, '.', '') }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>

  </div>

</section>
<script>
  $(document).ready(function() {
      $('table.display').DataTable( {
          "order":[[ 0, "asc" ]] 
      } );
  } );
  </script>



@endsection



