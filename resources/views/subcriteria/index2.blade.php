
@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>
 

<div class="card">   
  
  {{-- CARD HEADER TAMBAH DATA KRITERIA--}}
      <div class="card-header">
        <i class="fas fa-plus"></i><h4> Data SubKriteria</h4>
        <div class="card-header-action">
        <a href=" {{ url('subcriteria/create') }}" title="Tambah Kriteria" class="btn btn-success col-auto"> Tambah SubKriteria</a>
        </div>
      </div>

                                    
    {{-- CARD BODY --}}
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-1" class="table table-striped">
            <thead>
              <tr>
                <th class="col-1">No.</th>
                <th class="col-2">Nama Sub Kriteria</th>
                <th class="col-2">Nilai</th>
                <th class="col-3">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div> 
    </div>
  </div>

</section>



{{-- <script>
$(document).ready(function() {
    $('#table-1').DataTable( {
        "order":[[ 1, "asc" ]] 
    } );
} );
</script>

<script>

$(".delete").click(function() {

  var id = $(this).attr('data-id');
  var nama = $(this).attr('data-nama');
  swal({
      title: 'Hapus Data Kriteria '+nama,
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

</script> --}}


@endsection