@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('value/create') }}" title="Tambah Penilaian" class="btn btn-success ml-auto">Tambah Penilaian</a>
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
                <th>Aksi</th>
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
                  <td>{{$s->sub_nama}}</td>
                @endforeach
                <td>
                  <a href="{{ url('value/'.$a->id.'/edit') }}" title="Ubah Subkriteria" 
                    class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  {{-- HAPUS SUBKRITERIA --}}
                  <a href="#" data-id = "{{ $a->id }}" data-nama="{{ $a->nama_alternatif }}"  class="btn btn-danger btn-sm delete">
                    <form action="{{ route('value.destroy',$a->id)  }}" id="delete{{ $a->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                      <i class="fas fa-trash" ></i>
                    </a>
                </td>
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
    var nama_alternatif = $(this).attr('data-nama');
    swal({
        title: 'Hapus Data Penilaian '+nama_alternatif,
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


