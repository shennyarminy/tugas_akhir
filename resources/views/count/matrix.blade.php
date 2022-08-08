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
                <th>Nama Alternatif</th>
                @foreach (array_keys(current($matrix)) as $indexCriteria )
                <th>C{{$indexCriteria}}</th>
                
                @endforeach
               
            </tr>
        </thead>
        <tbody>
          @foreach ($alternatif as $a)
          
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama_alternatif}}</td>
            @php
            // mengubahnya menjadi collection
            $scr = $alternatif_details->where('alternatif_id', $a->id)->sortBy('criteria_id'); 
            
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
                <th>Alternatif</th>
                {{-- <th>Name</th> --}}
                @foreach (array_keys(current($matrix)) as $indexCriteria )
               
                <th>C{{$indexCriteria}}</th>
                
                
                @endforeach
               
            </tr>
        </thead>
        <tbody>

            @foreach (array_keys($matrix) as $indexAlternatif)
            
            <tr>
                <td>A{{$indexAlternatif}}</td>
              
                @foreach (array_keys($matrix[$indexAlternatif]) as $indexCriteria)
                  <td>{{$matrix[$indexAlternatif][$indexCriteria]}}</td>
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



