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

<h1 class="justify">Data Penghuni Kost Bulan {{ $bulan->isoFormat("MMMM") }}</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Keluhan Diterima</th>
    <th>No Kamar</th>
    <th>Keluhan</th>
  </tr>

  @foreach ($data as $row)
  @if ($row->keluhan!=0)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->updated_at->isoFormat("dddd,dd MMMM yy") }}</td>
    <td>{{ $row->no_kamar }}</td>
    <td>{{ $row->keluhan }}</td>
  </tr>   
  @endif
  @endforeach
</table>
Dicetak Pada {{ $bulan }}
</body>
</html>