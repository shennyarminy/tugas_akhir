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
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                @foreach ($criterias as $c)
                <th>{{$c->kode}}</th>
                @endforeach
               
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $a)
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

</section>


  
 



@endsection



