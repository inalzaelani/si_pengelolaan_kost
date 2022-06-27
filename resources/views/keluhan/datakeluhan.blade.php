@extends('layouts.master')
@section('content')
<body>
    <h1 class="text-center">Data Keluhan</h1>
    <div class="container ml-3">
        

        <div class="row">
        <table class="table table-hover">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">No Kamar</th>
                <th scope="col">Keluhan</th>
                <th scope="col">Bukti Keluhan</th>
                <th scope="col">Aksi</th>
            </tr>
               @foreach ($data as $row )
               <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->no_kamar }}</td>
                <td>{{ $row->keluhan }}</td>
                <td><img src="{{ asset('buktikeluhan/'.$row->bukti_keluhan ) }}" style="width :290px" alt=""></td>
                
                <td>
                <a href=""><button type="button" class="btn btn-secondary">Konfirmasi</button></a>
                <a href=""><button type="button" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">Hapus</button></button></a>
                </td>
            </tr>
            @endforeach
             
        </table>
@endsection