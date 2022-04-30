@extends('layouts.main')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>{{ $judul }}</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-plus-circle"></i><h4>Tambah Data Kriteria</h4>
        </div>

        <div class="card-body">
            <form action="{{ url('criteria') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode')?? $criteria->kode ?? '' }}" >

                        @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama')?? $criteria->nama ?? '' }}" >

                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="number" name="bobot" id="bobot" class="form-control @error('bobot') is-invalid @enderror" value="{{ old('bobot')?? $criteria->bobot ?? '' }}" >

                        @error('bobot')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="tipe">Jenis Kriteria</label>
                        <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                            <option value="{{ $criteria->tipe }} ? 'selected' : '' ">--Jenis Kriteria--</option>
                            <option value="benefit"{{ $criteria->tipe=="benefit" ? 'selected' : '' }}>Benefit</option>
                            <option value="cost"{{ $criteria->tipe=="cost" ? 'selected' : '' }}>Cost</option>
                        </select>
                        @error('tipe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <button type="reset" class="btn btn-primary float m-1">Reset</button>
                <button type="submit" class="btn btn-primary float m-1">Submit</button>
            </div>


            </form>


        </div>
    </div>
</section>


@endsection

<button type="button" title="Hapus Kriteria" class="btn btn-danger btn-sm " data-id="{{ $criteria->id}}" > <i class="fas fa-trash" ></i>
</button>

<form action="{{ url('criteria/'.$criteria->id) }}" method="POST" class="d-inline delete" >
  @csrf
  @method('DELETE')
  
  
  </form>

  <script>
    $('.delete').click(function() {
    
          var criteriaid = $(this).attr('data-id');
          swal({
                  title: 'Are you sure?',
                  text: 'Once deleted, you will not be able to recover this imaginary file! '+criteriaid+' ',
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                      // window.location = '/destroy/'+criteriaid+''
                      swal('Poof! Your imaginary file has been deleted!', {
                        icon: 'success',
                      });
                      $(`#delete${id}`)
                  } else {
                      swal('Your imaginary file is safe!');
                      }
            });
    });
    </script>


<form action="#" method="POST" class="d-inline"  id="swal-6" data-id="{{ $criteria->id}}">
    @csrf
    @method('DELETE')
        <button type="submit" title="Hapus Kriteria" class="btn btn-danger btn-sm"  > <i class="fas fa-trash" ></i>
        </button>
    
    
    </form>


  Subcriteria::create([
        'criteria_id' => '2',
        'namas' => 'bagus',
        'nilai' => 3, 
       
    ])