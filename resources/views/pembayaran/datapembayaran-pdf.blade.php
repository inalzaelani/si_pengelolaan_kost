<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
    @php
    use Carbon\carbon;

    $no=1;
    $bulan=Carbon::now();
@endphp

<h1 class="justify">Data Pembayaran Kost Bulan {{ $bulan->isoFormat("MMMM") }}</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>No Kamar</th>
    <th>Tanggal Pembayaran</th>
    <th>Harga Kamar Perbulan</th>
    <th>Sewa</th>
    <th>Jumlah Pembayaran</th>
  </tr>
  @php
      $sum=0;
  @endphp
  @foreach ($data as $row)
    @if($row->bukti_pembayaran!=0)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->no_kamar }}</td>
    <td>{{ (new Carbon($row->updated_at ))->isoFormat("D MMMM Y") }}</td>
    <td>Rp. {{ number_format($row->harga_kamar,0,',','.') }}</td>
    <td>{{ $row->sewa }}</td>
    <td>Rp. {{ number_format($row->total_bayar,0,',','.') }}</td>
</tr>
@php
     $sum+= $row->total_bayar;
@endphp
  @endif


  @endforeach
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Total Pendapatan</td>
     <td>Rp. {{ number_format($sum,0,',','.') }}</td>
    </tr>   
</table>
Dicetak Pada {{ $bulan }}
</body>
</html>