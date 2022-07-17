@extends('layouts.master')
@section('content')
    <h1 class="text-center">Invoice Pembayaran</h1>
    <div class="container">
        <div class="row">
            <div class="col-auto m-3"></div>
            </div>
        </div>
            <div class="row-auto m-3">
            <table class="table table-hover">
                <tr>
                    <th scope="col">Tanggal Pembayaran</th>
                </tr>
             
                   <tr>
                    <td>{{ $data->updated_at->toDateString() }}</td>
                    <td>
                    <a href="/exportpdfinvoice/{{ $data->id }}"><button type="button" class="btn btn-info">Cetak Invoice</button></a>

                    </td>
                </tr>
                 
            </table>
            </div>
         
    </div>
</div>
    
@include('sweetalert::alert')
@endsection
  