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
    <th>Jenis Kelamin</th>
    <th>No Kamar</th>
    <th>Tipe Kamar</th>
    <th>Sewa</th>
    <th>Tanggal Masuk</th>
  </tr>

  @foreach ($data as $row)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->jenis_kelamin }}</td>
    <td>{{ $row->no_kamar }}</td>
    <td>{{ $row->tipe_kamar }}</td>
    <td>{{ $row->sewa }}</td>
    <td>{{ $row->created_at }}</td>
</tr>   
  @endforeach
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Jumlah Penghuni</td>
    <td>{{ $no-1}}</td>
    </tr>  
</table>

</body>
</html>