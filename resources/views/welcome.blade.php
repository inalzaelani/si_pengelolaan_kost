@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $jumlahkeluhan }}</h3>
          <p>Keluhan Masuk</p>
        </div>
        <div class="icon">
          <i class="fas fa-cog"></i>
        </div>
      </div>
    </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $jumlahbayar }}</h3>
            <p>Pembayaran Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $jumlahpenghuni }}</h3>

            <p>Jumlah Penghuni</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ 25-$jumlahpenghuni }}</h3>

            <p>Kamar Tersedia</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection