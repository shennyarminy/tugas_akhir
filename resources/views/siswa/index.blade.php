@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('siswa/create') }}" title="Tambah siswa" class="btn btn-success ml-auto">Tambah siswa</a>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Data Siswa</h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama siswa</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>Nama Ayah</th>
              <th>Nama Ibu</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($siswas as $siswa)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $siswa->nama_siswa }}</td>
              <td>{{ $siswa->nis }}</td>
              <td>{{ $siswa->nisn }}</td>
              <td>{{ $siswa->nama_ayah }}</td>
              <td>{{ $siswa->nama_ibu }}</td>
              <td>{{ $siswa->alamat }}</td>
              <td>

                {{-- VIEW MODAL siswa --}}
                <button type="button" title="Detail siswa" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $siswa->id }}"> <i class="fas fa-eye"></i></button>

                <div class="modal fade" id="exampleModal{{ $siswa->id }}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 text-center" id="exampleModalLabel">{{ $siswa->nama_siswa }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="exampleModal{{ $siswa->subcriteria_id }}-tab" data-toggle="tab" href="#exampleModal{{ $siswa->subcriteria_id }}" role="tab" aria-controls="exampleModal{{ $siswa->subcriteria_id }}" aria-selected="true">Detail</a>
                          </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="exampleModal{{ $siswa->subcriteria_id }}" role="tabpanel" aria-labelledby="exampleModal{{ $siswa->subcriteria_id }}">
                            <div class="card">
                              <div class="card-body">
                                <div class="row text-left">
                                  <div class="col-6">
                                    <p>Nama Siswa</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="card-text">
                                      : &nbsp; {{ $siswa->nama_siswa }}
                                    </p>
                                  </div>
                                  <div class="col-6">
                                    <p>NIS</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="card-text">
                                      : &nbsp; {{ $siswa->nis }}
                                    </p>
                                  </div>
                                  <div class="col-6">
                                    <p>NISN</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="card-text">
                                      : &nbsp; {{ $siswa->nisn }}
                                    </p>
                                  </div>
                                  <div class="col-6">
                                    <p>Nama Ayah</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="card-text">
                                      : &nbsp; {{ $siswa->nama_ayah }}
                                    </p>
                                  </div>
                                  <div class="col-6">
                                    <p>Nama Ibu</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="card-text">
                                      : &nbsp; {{ $siswa->nama_ibu }}
                                    </p>
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
                    </div>
                  </div>
                </div>
                {{-- BATAS VIEW MODAL siswa --}}

                {{-- AWAL EDIT MODAL siswa --}}
                <a href="{{url('siswa/'.$siswa->id.'/edit')}}" title="Ubah Kriteria"
                  class=" btn btn-primary btn-sm ">
                  <i class="fas fa-pen"></i>
                </a>
                  {{-- AKHIR EDIT MODAL siswa --}}

                  {{-- AWAL HAPUS siswa --}}
                  <a href="#" data-id = "{{ $siswa->id }}" data-nama="{{ $siswa->nama_siswa }}"  class="btn btn-danger btn-sm delete">
                    <form action="{{ url('siswa/'.$siswa->id) }}" id="delete{{ $siswa->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>

                  <i class="fas fa-trash" ></i>
                </a>

                  {{-- AKHIR HAPUS siswa --}}
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
          "order":[[ 0, "asc" ]] 
      } );
  } );
  </script>
  
  <script>
  
  $(".delete").click(function() {
  
    var id = $(this).attr('data-id');
    var nama_siswa = $(this).attr('data-nama');
    swal({
        title: 'Hapus Data siswa '+nama_siswa,
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



