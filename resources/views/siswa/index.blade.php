@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('siswa/create') }}" title="Tambah siswa" class="btn btn-success ml-auto">Tambah siswa</a>
  </div>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Data siswa</h4>
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
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label for="nama_siswa">NAMA siswa</label>
                                      <input type="text" name="nama_siswa" id="nama_siswa"
                                        class="form-control"
                                        value="{{ $siswa->nama_siswa }}">
                                    </div>
                                  </div>
    
                                  @foreach ($criterias as $criteria)
                                  <div class="col-12 ">
                                    <div class="form-group">
                                      <label for="">{{ $criteria->nama_criteria }}</label>
                                      <select class="form-control"
                                        name="subcriteria_id[]">
                                        @foreach ($criteria->subcriterias as $subcriteria)
                                          <option
                                            value="{{ $subcriteria->id }}" 
                                            {{-- untuk membuat subcriteria mempunyai dropdown --}}
                                            <?php
                                                $cek = $siswa->perhitungans()->where('subcriteria_id', $subcriteria->id)->first();
                                                if ($cek) echo "selected";
                                            ?>

                                            >{{ $subcriteria->nama_subcriteria }}
                                          </option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                @endforeach
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
                  <button type="button" title="Edit siswa" class="d-inline btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal{{ $siswa->id }}">
                    <i class="fas fa-edit"></i>
                  </button>

                  <div class="modal fade" id="Modal{{ $siswa->id }}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title  w-100 text-center" id="ModalLabel">{{ $siswa->nama_siswa }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fadde show active" id="Modal{{ $siswa->id }}" role="tabpanel" aria-labelledby="Modal{{ $siswa->id }}">

                              <form action="{{ url('siswa/'.$siswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                  <input type="hidden" name="method" value="PATCH">
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label for="nama_siswa">Nama siswa</label>
                                          <input type="text" name="nama_siswa" id="nama_siswa"
                                            class="form-control @error  ('nama_siswa') is-invalid @enderror"
                                            value="{{ $siswa->nama_siswa }}">
                                          @error('nama_siswa')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                      </div>

                                      @foreach ($criterias as $criteria)
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="">{{ $criteria->nama_criteria }}</label>
                                            <select class="form-control @error('subcriteria_id') is-invalid @enderror"
                                              name="subcriteria_id[]">
                                              @foreach ($criteria->subcriterias as $subcriteria)
                                                <option
                                                  value="{{ $subcriteria->id }}"
                                                  <?php
                                                  $cek = $siswa->perhitungans()->where('subcriteria_id', $subcriteria->id)->first();
                                                  if ($cek) echo "selected";
                                                  ?>
                                                 >{{ $subcriteria->nama_subcriteria }}
                                                </option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      @endforeach
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>     
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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



