@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('alternatif/create') }}" title="Tambah Siswa" class="btn btn-success ml-auto">Tambah Siswa</a>
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
                <th>Nama Siswa</th>
                {{-- @foreach ($criterias as $c)
                <th>{{$c->kode}}</th>
                @endforeach --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->nama_alternatif}}</td>
              
                <td>
                  {{-- VIEW DETAIL --}}
                  <button type="button" title="Detail Alternatif" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $a->id }}" >
                    <i class="fas fa-eye"></i>
                  </button>
                  <div class="modal fade" id="exampleModal{{ $a->id }}" tabindex="-1"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title  w-100 text-center" id="exampleModalLabel">{{ $a->cri_nama }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-link active" id="exampleModal{{ $a->id }}-tab"
                                      data-toggle="tab" href="#exampleModal{{ $a->id }}" role="tab"
                                      aria-controls="exampleModal{{ $a->id }}" aria-selected="true">Detail</a>
                              </div>
                          </nav>
                            <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="exampleModal{{ $a->id }}" role="tabpanel" aria-labelledby="exampleModal{{ $a->id }}">
                                
                                {{-- ISI DARI VIEW --}}
                                <div class="row">
                                  <div class="col-12 ">
                                    <div class="form-group">
                                        <label  for="nama_alternatif">Nama Siswa</label>
                                        <input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control"
                                         value="{{ $a->nama_alternatif }}">
                                    </div>
                                  </div>
                                  {{-- LOOPING UNTUK CRITERIA DAN SUBCRITERIA --}}
                                  
                                  @foreach ($criterias as $key => $cri)
                                  <div class="col-12 ">
                                    <div class="form-group">
                                      <label for="criteria[{{ $cri->id }}]">{{ $cri->nama_criteria }} ({{ $cri->kode }})</label>
                                      <select class="form-control" id="criteria[{{ $cri->id }}]"
                                      name="criteria[{{ $cri->id }}]"> 
                                      @php
                                          $nilai = $subcriterias->where('criteria_id', $cri->id)->all();
                                      @endphp
                                     
                                      @foreach ($nilai as $item)
                                      <option value="{{ $item->id }}"
                                        
                                        {{ $item->id == $alternatif_details[$key]->subcriteria_id ? "selected=selected" : "" }}>
                                        {{ $item->nama_subcriteria }}</option>
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



                  {{-- VIEW DETAIL AKHIR --}}

                  <a href="{{ url('alternatif/'.$a->id.'/edit') }}" title="Ubah Alternatif" 
                    class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  {{-- HAPUS SUBKRITERIA --}}
                  <a href="#" data-id = "{{ $a->id }}" data-nama="{{ $a->nama_alternatif }}"  class="btn btn-danger btn-sm delete">
                    <form action="{{ route('alternatif.destroy',$a->id)  }}" id="delete{{ $a->id }}" method="POST">
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
        title: 'Hapus Data Alternatif '+nama_alternatif,
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



