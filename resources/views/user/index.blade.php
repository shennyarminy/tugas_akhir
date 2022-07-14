@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('user/create') }}" title="Tambah User" class="btn btn-success ml-auto">Tambah User</a>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Data User</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table  id="table-1"  class="table table-striped">
          <thead>
            <tr>
              <th class="col-1">No.</th>
              <th class="col-2">Nama</th>
              <th class="col-2"> Username</th>
              <th class="col-3"> Email</th>
              <th class="col-2"> Level</th>
              <th class="col-3">Aksi</th>            
            </tr>
          </thead>
          <tbody >          
            @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->nama}}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles }}</td>
              <td >
                {{-- EDIT USER --}}
                <a href="{{ url('user/'.$user->id.'/edit') }}" title="Ubah User" class="btn btn-primary btn-sm">
                  <i class="fas fa-pen"></i>
                </a>

                <a href="#" data-id ="{{ $user->id }}" data-nama="{{ $user->nama }}" class="btn btn-danger btn-sm delete">
                  <form action="{{ url('user/'.$user->id) }}" id="delete{{ $user->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  </form>
                  <i class="fas fa-trash"></i>
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
          // "order":[[ 1, "asc" ]] 
      } );
  } );
  </script>
  
  <script>
  
  $(".delete").click(function() {
  
    var id = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
        title: 'Hapus Data User '+nama,
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


