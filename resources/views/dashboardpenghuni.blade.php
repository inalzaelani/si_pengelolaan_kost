@extends('layouts.master')
@section('content')

@php
 $tanggalhariini = new DateTime();
 $tanggalbayar = new DateTime(Auth::guard('occupant')->user()->tanggal_bayar);   

 $sisahari = $tanggalhariini->diff($tanggalbayar)->format("%a");

@endphp

@if($sisahari<=7)
<div class="small-box bg-warning">
    <div class="inner">
      <h3>{{ $sisahari }} Hari</h3>
      <p>Jatuh Tempo Bayar Sewa di {{  Auth::guard('occupant')->user()->tanggal_bayar}}</p>
    </div>
    <div class="icon">
        <i class=""></i>
      </div>
  </div>
@endif

{{-- @if($telat>0 )
<div class="small-box bg-danger">
    <div class="inner">
      <h3>Telat Pembayaran {{ $telat }} Hari</h3>
      <p>Jatuh Tempo Bayar Sewa di {{  Auth::guard('occupant')->user()->tanggal_bayar}}</p>
    </div>
    <div class="icon">
        <i class=""></i>
      </div>
  </div>
@endif --}}
@include('sweetalert::alert')
@endsection