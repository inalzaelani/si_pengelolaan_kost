@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@php
use Carbon\Carbon;

//  $tanggalhariini = Carbon::today();
//  $tanggalbayar = Carbon::create(Auth::guard('occupant')->user()->tanggal_bayar); 
   

//  $sisahari = $tanggalhariini->diff($tanggalbayar)->format("%a")+1;

$created = new Carbon(Auth::guard('occupant')->user()->tanggal_bayar);
$now = Carbon::today();
$sisahari = ($now->diff($created)->d)

@endphp 
{{-- @dd($sisahari) --}}

<div class="container">
@if($now->diff($created)->invert>0)
<div class="small-box bg-danger">
    <div class="inner">
      <h3>Jatuh Tempo</h3>
      <p>Jatuh Tempo Bayar Sewa di {{  Auth::guard('occupant')->user()->tanggal_bayar}} <br>Segera Lakukan Pembayaran
      <a href="/tampilpembayaranpenghuni/{{ Auth::guard('occupant')->user()->id }}"> di sini </a></p>
    </div>
    </a>
    <div class="icon">
        <i class=""></i>
      </div>
  </div>
@elseif($sisahari>=1 && $sisahari<=7) 
<div class="small-box bg-warning">
    <div class="inner">
      <h3>{{ $sisahari }} Hari Menuju Jatuh Tempo</h3>
      <p>Jatuh Tempo Bayar Sewa di {{  Auth::guard('occupant')->user()->tanggal_bayar}} <br>Segera Lakukan Pembayaran
        <a href="/tampilpembayaranpenghuni/{{ Auth::guard('occupant')->user()->id }}"> di sini </a></p>
    </div>
    <div class="icon">
        <i class=""></i>
      </div>
  </div>
@elseif($sisahari==0)
<div class="small-box bg-danger">
    <div class="inner">
      <h3>Hari Ini Jatuh Tempo</h3>
      <p>Jatuh Tempo Bayar Sewa di {{  Auth::guard('occupant')->user()->tanggal_bayar}} <br>Segera Lakukan Pembayaran
      <a href="/tampilpembayaranpenghuni/{{ Auth::guard('occupant')->user()->id }}"> di sini </a></p>
    </div>
    </a>
    <div class="icon">
        <i class=""></i>
      </div>
  </div>
@endif



<table class="table table-bordered">
  <tr>
    <th>Nama</th>
    <td>{{ Auth::guard('occupant')->user()->nama}}</td>
  </tr>
  <tr>
    <th>Kamar</th>
    <td>{{ Auth::guard('occupant')->user()->no_kamar}}</td>
  </tr>
  <tr>
    <th>Jatuh Tempo Bayar Sewa</th>
    <td>{{ Auth::guard('occupant')->user()->tanggal_bayar}}</td>
  </tr>
</table>

</div>
@include('sweetalert::alert')
@endsection