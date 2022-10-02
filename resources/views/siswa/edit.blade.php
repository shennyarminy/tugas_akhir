@extends('layouts.main')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
      <div class="card-header">
        <i class="fas fa-plus-circle"></i><h4>Ubah Data Subriteria</h4>
      </div>
      <div class="card-body">
        <form action="{{ url('siswa/'. $siswa->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="method" value="PATCH">
          <div class="row">
            <div class="col-12 ">
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}">
                </div>
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}">
              </div>
            </div>
            <div class="col-12 ">
              <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}">
              </div>
            </div>
            <div class="col-12 ">
              <div class="form-group">
                <label for="number">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}">
              </div>
            </div>
            <div class="col-12 ">
              <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="{{ $siswa->nama_ayah }}">
              </div>
            </div>
            <div class="col-12 ">
              <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ $siswa->nama_ibu }}">
              </div>
            </div>
            <div class="col-12 ">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $siswa->alamat}}">
              </div>
            </div>

              {{-- LOOPING UNTUK CRITERIA  --}}             
              @foreach ($criterias as $criteria)
              <div class="col-12 col-lg-6">
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

          {{-- CARD-FOOTER --}}
          <div class="card-footer text-right">
            <a href="{{ url('subcriteria') }}" class="btn btn-danger float">Batal</a>
            <button type="submit" class="btn btn-primary float success"> Submit</button>
          </div>
        </form>
      </div>
  </div>
  </section>
@endsection