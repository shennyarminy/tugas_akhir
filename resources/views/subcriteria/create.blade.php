@extends('layouts.main')
@section('content')

    <div class="row ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('subcriteria.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama Kriteria</label>
                                    <select class="form-control select2 @error('criteria_id') is-invalid @enderror" name="criteria_id">
                                        @foreach ($criterias as $criteria)
                                            <option value="{{$criteria->id}}">
                                                {{$criteria->nama}} 
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('criteria_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection