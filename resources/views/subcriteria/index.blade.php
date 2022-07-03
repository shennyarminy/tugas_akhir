
@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href=" {{ url('subcriteria/create') }}" title="Tambah Subkriteria" class="btn btn-success ml-auto"> Tambah Subkriteria</a>
  </div>
 
<div class="card">   
  <div class="card-header">
    <i class="fas fa-plus"></i><h4>Daftar Data Subkriteria</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="table-1" class="table table-striped">
        <thead>
          <tr>
            <th class="col-1">No.</th>
            <th class="col-3">Kode Kriteria</th>
            <th class="col-3">Nama Subkriteria</th>
            <th class="col-2">Nilai Subkriteria</th>
            <th class="col-3">Aksi</th>
          </tr>
        </thead>
        <tbody>

      @foreach ($data as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->kode}}</td>
        <td>{{ $item->nama_subcriteria}}</td>
        <td>{{ $item->nilai_subcriteria }}</td>
        <td >
          <a href="{{ url('subcriteria/'.$item->id.'/edit') }}" title="Ubah Subkriteria" 
            class="btn btn-primary btn-sm">
            <i class="fas fa-pen"></i>
          </a>
          {{-- HAPUS SUBKRITERIA --}}
          <a href="#" data-id = "{{ $item->id }}" data-nama="{{ $item->nama_subcriteria }}"  class="btn btn-danger btn-sm delete">
            <form action="{{ url('subcriteria/'.$item->id) }}" id="delete{{ $item->id }}" method="POST">
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
</div>
</section>

<script>
$(document).ready(function() {
    $('#table-1').DataTable( {
        "order":[[ 1, "asc" ]] 
    } );
} );
</script>

<script>
  $(".delete").click(function(){
 
   var id= $(this).attr('data-id');
   var nama_subcriteria = $(this).attr('data-nama');
   swal({
     title: 'Hapus Data Subkriteria '+nama_subcriteria,
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