
@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    @if (auth()->user()->roles == "ADMIN")
    <a href=" {{ url('criteria/create') }}" title="Tambah Kriteria" class="btn btn-success ml-auto"> Tambah Kriteria</a>
    @endif
  </div>

  @if ($nilai > 1.00)
<div class="alert alert-danger alert-dismissible " role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <strong>Total Bobot Kriteria tidak boleh lebih dari 1! </strong>
  <br>
  <strong>Total Bobot {{ $nilai }}</strong>
</div>
@elseif ($nilai < 1.00)
<div class="alert alert-danger alert-dismissible " role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <strong>Total Bobot Kriteria tidak boleh kurang dari 1!</strong>
  <br>
  <strong>Total Bobot {{ $nilai }}</strong>
</div>
@else
<div class="alert alert-primary alert-dismissible " role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <strong>Penghitungan boleh dilanjutkan, bobot kriteria sama dengan 1.</strong>
</div>
@endif
 
<div class="card">   
  <div class="card-header">
    <i class="fas fa-plus"></i><h4>Daftar Data Kriteria</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="table-1" class="table table-striped">
        <thead>
          <tr>
            <th class="col-1">No.</th>
            <th class="col-2">Kode Kriteria</th>
            <th class="col-2">Nama Kriteria</th>
            @if (auth()->user()->roles == "DM")
            <th class="col-2">Bobot</th>
            <th class="col-2">Jenis</th>
            @endif
            <th class="col-3">Aksi</th>
          </tr>
        </thead>
        <tbody>

      @foreach ($criterias as $criteria)
      
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $criteria->kode}}</td>
        <td>{{ $criteria->nama_criteria}}</td>
        @if (auth()->user()->roles == "DM")
        <td>{{ $criteria->bobot_criteria}}</td>
        <td>{{ $criteria->tipe}}</td>
        @endif
        <td >
          <a href="{{url('criteria/'.$criteria->id.'/edit')}}" title="Ubah Kriteria"
            class=" btn btn-primary btn-sm ">
            <i class="fas fa-pen"></i>
          </a>
            <!-- Button trigger modal -->
            <button type="button" title="Detail Kriteria" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $criteria->id }}" >
              <i class="fas fa-eye"></i>
            </button>
            {{-- <button type="button" title="Edit Kriteria" class="d-inline btn btn-primary btn-sm " data-toggle="modal" data-target="#Modal{{ $criteria->id }}" >
                <i class="fas fa-edit"></i>
            </button> --}}

            <!-- MODAL VIEW KRITERIA -->
            <div class="modal fade" id="exampleModal{{ $criteria->id }}" tabindex="-1"
            data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title  w-100 text-center" id="exampleModalLabel">{{ $criteria->nama_criteria }}</h4>
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
                                  : &nbsp; {{ $criteria->nama_criteria }}
                                </p>
                              </div>
                              <div class="col-6">
                                <p>Bobot Kriteria</p>
                              </div>
                              <div class="col-6">
                                <p class="card-text">
                                  : &nbsp; {{ $criteria->bobot_criteria }}
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


          
                {{-- HAPUS KRITERIA --}}
          {{-- <a href="#" data-id = "{{ $criteria->id }}" data-nama="{{ $criteria->nama_criteria }}"  class="btn btn-danger btn-sm delete">
              <form action="{{ url('criteria/'.$criteria->id) }}" id="delete{{ $criteria->id }}" method="POST">
                @csrf
                @method('DELETE')
              </form>
            <i class="fas fa-trash" ></i>
          </a> --}}

          <button class="btn btn-danger btn-sm delete" data-toggle="modal"
          data-target="#modaldelete{{ $criteria->id }}"><i
              class="fas fa-trash-alt"></i></button>
           <div class="modal fade" id="modaldelete{{ $criteria->id }}" role="dialog">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header text-center">
                      <h5 class="modal-title  w-100">Delete Kriteria</h5>
                  </div>
                  <div class="modal-body">
                      <h6 style="font-weight:normal">Apakah anda benar ingin menghapus
                           {{ $criteria->nama_criteria }}?</h6>
                      {{-- <div class="text-secondary" style="align-content: flex-start">
                          Last
                          updated:
                          {{ $data->updated_at->format('d F Y') }}
                      </div> --}}
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                      <div style="display:none">
                          <input type="text" name="id" value="{{ $criteria->id }}">
                      </div>
                      <button class="btn btn-md btn-default"
                          data-dismiss="modal">No</button>
                      <form action="{{ url('criteria/'.$criteria->id) }}"
                          method="POST" class="form">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger" type="submit">Yes</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
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
        // "order":[[ 1, "asc" ]] 
    } );
} );
</script>

{{-- <script>
$(".delete").click(function() {

  var id = $(this).attr('data-id');
  var nama_criteria = $(this).attr('data-nama');
  swal({
      title: 'Hapus Data Kriteria '+nama_criteria,
      // text: 'Once deleted, you will not be able to recover this imaginary file! ',
      icon: 'warning',
      buttons: true,
      dangerMode: false,
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