@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>OPTIMASI</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped display">
          <thead>
            <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Optimasi</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($optimization as $opt => $val)
            <tr>
                <td>{{ $opt }}</td>
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

<script>
  $(document).ready(function(){
    $('table.display').DataTable({
      // "paging":   false,
      // "ordering": false,
      // "info":     false,
      // "searching" : false,
    })
  })
</script>



@endsection



