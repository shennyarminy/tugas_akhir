@extends('layouts.main') 
@section('content')

<section class="section">
    <div class="section-header">
      <h1>{{ $judul }}</h1>
    </div>
    <div class="alert alert-primary alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>Selamat Datang di Sistem Pendukung Keputusan Beasiswa PIP</strong>
  </div>

    @php
        $criteria = DB::table('criterias')->count();
        $subcriteria = DB::table('subcriterias')->count();
        $alternatif = DB::table('alternatifs')->count();
        $user = DB::table('users')->count();
    @endphp

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>KRITERIA </h4>
            </div>
            <div class="card-body">
              {{ $criteria }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-file-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>SUBKRITERIA</h4>
            </div>
            <div class="card-body">
              {{ $subcriteria }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-columns"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>ALTERNATIF</h4>
            </div>
            <div class="card-body">
              {{ $alternatif }}
            </div>
          </div>
        </div>
      </div>
      @if ((auth()->user()->roles == "ADMIN"))
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-users-cog"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>USER</h4>
            </div>
            <div class="card-body">
              {{ $user }}
            </div>
          </div>
        </div>
      </div>   
      @endif
    </div>

  </section>

@endsection