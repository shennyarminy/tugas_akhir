@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Matrix MOORA</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped display">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama siswa</th>
                @foreach (array_keys(current($matrix)) as $indexCriteria )
                <th>C{{$indexCriteria}}</th>
                
                @endforeach
               
            </tr>
        </thead>
        <tbody>
          @foreach ($siswa as $a)
          
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama_siswa}}</td>
            @php
            // mengubahnya menjadi collection
            $scr = $perhitungans->where('siswa_id', $a->id)->sortBy('criteria_id'); 
            
            @endphp

            @foreach ($scr as $s)
              <td>{{$s->subcriteria->nama_subcriteria}}</td>
            
            @endforeach
              
          </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>

  </div>


  {{-- BATAS MATRIX BERUBAH KE A-.... --}}

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Matrix MOORA</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped display">
          <thead>
            <tr>
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
                <td>A{{$indexsiswa}}</td>
              
                @foreach (array_keys($matrix[$indexsiswa]) as $indexCriteria)
                  <td>{{$matrix[$indexsiswa][$indexCriteria]}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>

  </div>


  
  <script>
    $(document).ready(function() {
        $('table.display').DataTable( {
            "order":[[ 0, "asc" ]] 
        } );
    } );
    </script>
  
</section>


  
 



@endsection



