@extends('layouts.master')
@section('content')
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
                <th scope="col">Aksi</th>
            </tr>
               @foreach ($data as $row )
               <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->no_kamar }}</td>
                <td>{{ $row->updated_at }}</td>
                <td><img src="{{ asset('buktipembayaran/'.$row->bukti_pembayaran ) }}" style="width :290px" alt=""></td>
                <td>
                <a href="/tampilpembayaran/{{ $row->id }}"><button type="button" class="btn btn-secondary">Konfirmasi</button></a>
                <a href=""><button type="button" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">Hapus</button></button></a>
                </td>
            </tr>
            @endforeach
             
        </table>
        @include('sweetalert::alert')
@endsection