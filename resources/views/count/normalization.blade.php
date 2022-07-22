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
                  <td>{{ number_format((float)$Normalization[$indexAlternatif][$indexCriteria], 4, '.', '') }}</td>
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
  $(document).ready(function(){
    $('table.display').DataTable({
      columnDefs: [
          { 'natural', targets: [ 0, 1 ]}
        ]
      // "paging":   false,
      // "ordering": false,
      // "info":     false,
      "searching" : true,
    })
  })
</script>



  
 



@endsection



