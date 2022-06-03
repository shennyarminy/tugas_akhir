
@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>

  <div class="card">

    {{-- CARD HEADER ALTERNATIF --}}
    <div class="card-header">
      <i class="fas fa-table"></i><h4>Daftar Data Alternatif</h4>
      <div class="card-header-action">
        <a href="{{ url('alternatif/create') }}" title="Tambah Alternatif" class="btn btn-success col-auto">Tambah Alternatif</a>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="table-1" class="table table-striped">
          <thead>
            <tr>
              <th class="col-1">No.</th>
              <th class="col-4">Nama Alternatif</th>
              <th class="col-4">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alternatifs as $alternatif)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $alternatif->nama }}</td>
                <td>

                  <button type="button" title="Detail Alternatif" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $alternatif->id }}" >
                    <i class="fas fa-eye"></i>
                  </button>

                  <button type="button" title="Edit Alternatif" class="d-inline btn btn-primary btn-sm " data-toggle="modal" data-target="#Modal{{ $loop->iteration}}" >
                    <i class="fas fa-edit"></i>
                </button> 

                {{-- VIEW MODAL --}}
                <div class="modal fade" id="exampleModal{{ $alternatif->id }}" tabindex="-1"
                  data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title  w-100 text-center" id="exampleModalLabel">{{ $alternatif->nama }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="exampleModal{{ $alternatif->subcriteria_id }}-tab"
                                    data-toggle="tab" href="#exampleModal{{ $alternatif->subcriteria_id }}" role="tab"
                                    aria-controls="exampleModal{{ $alternatif->subcriteria_id }}" aria-selected="true">Detail</a>
                                
                            </div>
                        </nav>
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="exampleModal{{ $alternatif->subcriteria_id }}" role="tabpanel" aria-labelledby="exampleModal{{ $alternatif->subcriteria_id }}">
                              
                              {{-- ISI DARI VIEW --}}
                              <div class="card">
                                <div class="card-body">
                                  <div class="row text-left">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nama">NAMA ALTERNATIF</label>
                                        <input type="text" name="nama" id="nama"
                                          class="form-control"
                                          value="{{ $alternatif->nama }}">
                                      </div>
                                    </div>
                                    

                                    @foreach ($criterias as $criteria)
                                        <div class="col-12 ">
                                          <div class="form-group">
                                            <label for="">{{ $criteria->nama }}</label>
                                            <select class="form-control"
                                              name="subcriteria_id[]">
                                              @foreach ($criteria->subcriterias as $subcriteria)
                                                <option
                                                  value="{{ $subcriteria->id }}">
                                                  {{ $subcriteria->namas }}
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
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              {{-- AKHIT DETAIL VIEW --}}

                {{-- EDIT MODAL --}}
                  <div class="modal fade" id="Modal{{ $loop->iteration}}" tabindex="-1"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="ModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title  w-100 text-center" id="ModalLabel">{{ $alternatif->nama }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="modal{{  $alternatif->subcriteria_id }}" role="tabpanel" aria-labelledby="modal{{  $alternatif->subcriteria_id }}">
                                
                                <form action="{{ url('alternatif/'.$alternatif->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                  <input type="hidden" name="method" value="PATCH">
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label for="nama">Nama Alternatif</label>
                                          <input type="text" name="nama" id="nama"
                                            class="form-control @error  ('nama') is-invalid @enderror"
                                            value="{{ $alternatif->nama }}">
                                          @error('nama')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                      </div>

                                      {{-- LOOPING UNTUK CRITERIA DAN SUBCRITERIA --}}

                                      @foreach ($criterias as $criteria)
                                        <div class="col-12 ">
                                          <div class="form-group">
                                            <label for="">{{ $criteria->nama }}</label>
                                            <select class="form-control @error('subcriteria_id') is-invalid @enderror"
                                              name="subcriteria_id[]">
                                              @foreach ($criteria->subcriterias as $subcriteria)
                                                <option
                                                  value="{{ $subcriteria->id }}"
                                                  <?php
                                                  $cek = $alternatif->alternatif_details()->where('subcriteria_id', $subcriteria->id)->first();
                                                  if ($cek) echo "selected";
                                                  ?>
                                                >
                                                  {{ $subcriteria->namas }}
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
                </td>
              </tr>   
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
