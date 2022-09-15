@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Data Penilaian</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                @foreach ($criterias as $c)
                <th>{{$c->kode}}</th>
                @endforeach
                
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->nama_siswa}}</td>
                @php
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

</section>

<script>
  $(document).ready(function() {
      $('#table-1').DataTable( {
          // "order":[[ 0, "asc" ]] 
      } );
  } );
  </script>
  
  <script>
  
  $(".delete").click(function() {
  
    var id = $(this).attr('data-id');
    var nama_siswa = $(this).attr('data-nama');
    swal({
        title: 'Hapus Data Penilaian '+nama_siswa,
        // text: 'Once deleted, you will not be able to recover this imaginary file! ',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
          swal('Berhasil dihapus', {
            icon: 'success',
          });
          $(`#delete${id}`).submit();
  
        } 
      });
  });
  
  </script>




@endsection


