@extends('layouts.master')
@section('content')
    <h1 class="text-center">Data Penghuni</h1>
       
    <div class="container">
        <div class="row">
            <div class="col-auto m-3"></div>
                <form action="/penghuni" method="GET">
                    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Cari....">
                </form>
            </div>
        </div>
            <div class="row-auto m-3">
            <table class="table table-hover">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">No Kamar</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Aksi</th>
                </tr>
             
                   @foreach ($data as $row)
                   <tr>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->no_kamar }}</td>
                    <td>{{ $row->tipe_kamar }}</td>
                    <td>
                    <a href="/details/{{ $row->id }}"><button type="button" class="btn btn-info">Detail</button></a>
                    <a href="/tampilkandata/{{ $row->id }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                    <a href="/delete/{{ $row->id }}"><button type="button" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">Hapus</button></button></a>
                    </td>
                </tr>
                   @endforeach
                 
            </table>
            {{ $data->links('pagination::bootstrap-4') }}
            </div>
         
    </div>
</div>
    
@include('sweetalert::alert')
@endsection
  