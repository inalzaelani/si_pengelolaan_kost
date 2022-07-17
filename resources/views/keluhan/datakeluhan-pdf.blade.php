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
    $no=1;
    $bulan=date('F');
@endphp

<h1 class="justify">Data Penghuni Kost Bulan {{ $bulan }}</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>No Kamar</th>
    <th>Keluhan</th>
  </tr>

  @foreach ($data as $row)
  @if ($row->keluhan!=0)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->no_kamar }}</td>
    <td>{{ $row->keluhan }}</td>
  </tr>   
  @endif
  @endforeach
</table>

</body>
</html>