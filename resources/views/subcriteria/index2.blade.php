@extends('layouts.app')
@section('content')

    <div class="row ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('borrow.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Murid</label>
                                    <select class="form-control select2 @error('student_id') is-invalid @enderror" name="student_id">
                                        @foreach ($students as $student)
                                            <option value="{{$student->id}}">
                                                {{$student->name}} <--> {{ $student->kelas->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('student_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Buku</label>
                                    <select class="form-control select2 @error('book_id') is-invalid @enderror" name="book_id" id="book">
                                        <option value="">-- Pilih Buku --</option>
                                        @foreach ($books as $book)
                                            <option value="{{$book->id}}">
                                                {{$book->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('book_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Kode Buku</label>
                                    <select class="form-control @error('book_code_id') is-invalid @enderror" name="book_code_id" id="book_code">
                                       <option value=""></option>
                                    </select>
                                     @error('book_code_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
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

@push('select2css')
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
@endpush

@push('script')
    <script>
        $('#book').change(function(){
        var book_id = $(this).val();    
        if(book_id){
            $.ajax({
            type:"GET",
            url:"/get-book-code?book_id="+book_id,
            dataType: 'JSON',
            success:function(res){               
                if(res){
                    $("#book_code").empty();
                    $.each(res, function(id, code){
                        $("#book_code").append('<option value="'+id+'">'+code+'</option>');
                    });
                    }
                }
            });
        }      
        });
    </script>

    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script >
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
@endpush