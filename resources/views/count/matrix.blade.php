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
                @foreach (array_keys(current($Matrix)) as $indexCriteria )
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
                $scr = $detail->where('alt', $a->id)->all();
                @endphp
                @foreach ($scr as $s)
                  <td>{{$s->sub_nilai}}</td>

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
                @foreach (array_keys(current($Matrix)) as $indexCriteria )
                <th>C{{$indexCriteria}}</th>
                
                
                @endforeach
               
            </tr>
        </thead>
        <tbody>
            @foreach (array_keys($Matrix) as $indexAlternatif)
            <tr>
                <td>A{{$indexAlternatif}}</td>
                
                @foreach (array_keys($Matrix[$indexAlternatif]) as $indexCriteria)
                  <td>{{$Matrix[$indexAlternatif][$indexCriteria]}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>

  </div>


  <script>
    $(document).ready(function(){
      $('table.display').DataTable({
        "paging":   false,
        // "ordering": false,
        // "info":     false,
        // "searching" : false,
      })
    })
  </script>
</section>


  
 



@endsection



