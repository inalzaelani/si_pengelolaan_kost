@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-center">Data Penghuni {{ $data->nama }}</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="cardbody">
                    <table  class="table table-striped">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $data->nama }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $data->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>0{{ $data->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Identitas</th>
                            <td> <img src="{{ asset('buktiidentitas/'.$data->bukti_identitas ) }}" style="width :290px" alt=""></td>
                        </tr>
                        <tr>
                            <th>No Kamar</th>
                            <td>{{ $data->no_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Tipe Kamar</th>
                            <td>{{ $data->tipe_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Harga Kamar</th>
                            <td>{{ $data->harga_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Sewa</th>
                            <td>{{ $data->sewa }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal masuk</th>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Bayar Sewa Berikutnya</th>
                            <td>{{ $data->tanggal_bayar }}</td>
                        </tr>
                        <tr>
                            <th>Total bayar</th>
                            <td>Rp{{ $data->total_bayar }}</td>
                        </tr>
                    </table>
                   
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection