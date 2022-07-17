<!DOCTYPE html>
<html lang="en">
@php
use Carbon\Carbon;
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Rumah Kost Budi Sari</h1>
<br>
PK/{{ $data->updated_at->toDateString() }}/{{ $data->id }}
<br>
<b>Telah Diterima <br></b>
Dari:  {{ $data->nama }} <br>
Sebesar : Rp. {{ number_format($data->total_bayar,0,',','.') }},- <br>
Pada Tanggal : {{ $data->updated_at->isoFormat("dddd, D MMMM Y") }} <br>
Untuk Pembayaran Kamar Kost no  {{ $data->no_kamar }} <br>
Tipe kamar :{{ $data->tipe_kamar }} <br>
Jenis Sewa :{{ $data->sewa }} <br>
Periode: {{ $data->updated_at->isoFormat("D MMMM Y")  }} S/D  {{ (new Carbon($data->tanggal_bayar ))->isoFormat("D MMMM Y")}} <br>
<br>
<br>
Bandung, {{ $data->updated_at->isoFormat(" D MMMM Y") }}
  <table class="table table-striped">
    <tr>
        <th>Penerima</th>
        <th>Penyetor</th> 
    </tr>
        <td><br><br>Pengelola Rumah Kost Budi Sari</td>
        <td><br><br>{{ $data->nama }}</td>    
    </tr>
  </table>
</body>
</html>