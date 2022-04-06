
@extends('layouts.main')
@section('content')






<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
  </div>
 

<div class="card">   
  
  {{-- CARD HEADER TAMBAH DATA KRITERIA--}}
      <div class="card-header">
        <i class="fas fa-plus"></i><h4>Tambah Data Kriteria</h4>
        <div class="card-header-action">
        <a href=" {{ url('criteria/create') }}" title="Tambah Kriteria" class="btn btn-success col-auto"> Tambah Kriteria</a>
        </div>
      </div>

                                    
    {{-- CARD BODY --}}
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-1" class="table table-striped">
            <thead>
              <tr>
                <th class="col-1">No.</th>
                <th class="col-2">Kode Kriteria</th>
                <th class="col-2">Nama Kriteria</th>
                <th class="col-2">Bobot</th>
                <th class="col-2">Jenis</th>
                <th class="col-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($criterias as $criteria)
             
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $criteria->kode}}</td>
                <td>{{ $criteria->nama}}</td>
                <td>{{ $criteria->bobot}}</td>
                <td>{{ $criteria->tipe}}</td>
                <td class="text-center">
  
                 
                    <!-- Button trigger modal -->
                    <button type="button" title="Detail Kriteria" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $criteria->id }}" >
                      <i class="fas fa-eye"></i>
                    </button>
  
                    <!-- MODAL VIEW KRITERIA -->
                    <div class="modal fade" id="exampleModal{{ $criteria->id }}" tabindex="-1"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title  w-100 text-center" id="exampleModalLabel">{{ $criteria->nama }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-link active" id="exampleModal{{ $criteria->id }}-tab"
                                      data-toggle="tab" href="#exampleModal{{ $criteria->id }}" role="tab"
                                      aria-controls="exampleModal{{ $criteria->id }}" aria-selected="true">Detail</a>
                                  
                              </div>
                          </nav>
                            <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="exampleModal{{ $criteria->id }}" role="tabpanel" aria-labelledby="exampleModal{{ $criteria->id }}">
                                
                                {{-- ISI DARI VIEW --}}
                                <div class="card">
                                  <div class="card-body">
                                    <div class="row text-left">
                                      <div class="col-6">
                                        <p>Kode Kriteria</p>
                                      </div>
                                      <div class="col-6">
                                        <p class="card-text">
                                          : &nbsp; {{ $criteria->kode }}
                                        </p>
                                      </div>
                                      <div class="col-6">
                                        <p>Nama Kriteria</p>
                                      </div>
                                      <div class="col-6">
                                        <p class="card-text">
                                          : &nbsp; {{ $criteria->nama }}
                                        </p>
                                      </div>
                                      <div class="col-6">
                                        <p>Bobot Kriteria</p>
                                      </div>
                                      <div class="col-6">
                                        <p class="card-text">
                                          : &nbsp; {{ $criteria->bobot }}
                                        </p>
                                      </div>
                                      <div class="col-6">
                                        <p>Jenis Kriteria</p>
                                      </div>
                                      <div class="col-6">
                                        <p class="card-text">
                                          : &nbsp; {{ $criteria->tipe }}
                                        </p>
                                      </div>
                   
  
                                    </div>
                                  </div>
                                </div>
  
  
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          
                          </div>
                        </div>
                      </div>
                    </div>
  
                    {{-- EDIT KRITERIA --}}
                    <a href="{{url('criteria/'.$criteria->id.'/edit')}}" title="Ubah Buku"
                              class=" btn btn-primary btn-sm ">
                              <i class="fas fa-pen"></i>
                    </a>

                  {{-- HAPUS KRITERIA --}}
                  <a href="#" data-id = "{{ $criteria->id }}" data-nama="{{ $criteria->nama }}" class="btn btn-danger btn-sm delete">
                      <form action="{{ url('criteria/'.$criteria->id) }}" id="delete{{ $criteria->id }}" method="POST">
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

</script>


@endsection