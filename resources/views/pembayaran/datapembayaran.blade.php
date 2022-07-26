@extends('layouts.master')
@section('content')
@php
    use Carbon\carbon;
@endphp
<body>
    <h1 class="text-center">Data Pembayaran</h1>
    <div class="container ml-3">
        

        <div class="row">
        <table class="table table-hover">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">No Kamar</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
               @foreach ($data as $row )
               @if($row->bukti_pembayaran!=0)
               @php
                   if($row->status==0)
                   $row->status="Belum Dikonfirmasi"
               @endphp
               <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->no_kamar }}</td>
                <td>{{ Carbon::parse($row->updated_at)->isoFormat("d MMMM Y")}}</td>
                <td><img src="{{ asset('buktipembayaran/'.$row->bukti_pembayaran ) }}" style="width :290px" alt=""></td>
                <td>{{ $row->status }}</td>
                <td>
                <a href="/tampilpembayaran/{{ $row->id }}"><button type="button" class="btn btn-secondary">Konfirmasi</button></a>
                <a href="/hapuspembayaran/{{ $row->id }}"><button type="button" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">Hapus</button></button></a>
                </td>
            </tr>
            @endif
            @endforeach
             
        </table>
        @include('sweetalert::alert')
@endsection