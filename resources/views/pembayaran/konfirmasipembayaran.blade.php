@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')
<div class="container">
  <h1 class="text-center">Konfirmasi Pembayaran</h1>


  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="cardbody">
          <form action="/updatepembayaran/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" class="form-control" id="username" name="nama" aria-describedby="emailHelp" value="{{ $data->nama }}">
            </div>
            @error('no_kamar')
            <div class="alert alert-danger">{{ "Kamar Telah Terisi, Silakan pilih kamar lain!" }}</div>
            @enderror
            <div class="mb-3">
              <label for="no_kamar" class="form-label">Nomor Kamar (1-25)</label>
              <input type="number" name="no_kamar" class="form-control" id="no_kamar" value="{{ $data->no_kamar }}" onkeyup="add();">
            </div>
            <div class="mb-3">
              <label for="no_kamar" class="form-label">Tipe Kamar</label>
              <input type="text" name="tipe_kamar" class="form-control" id="tipe_kamar" value="{{ $data->tipe_kamar }}" onkeyup="add();">
            </div>
            <div class="mb-3">
              <label for="no_kamar" class="form-label">Harga Kamar</label>
              <input type="number" name="harga_kamar" class="form-control" id="harga_kamar" value="{{ $data->harga_kamar }}" onkeyup="add();">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sewa</label>
              <select class="form-select" name="sewa" aria-label="Default select example">
                <option selected>{{ $data->sewa }}</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Tahunan">Tahunan</option>
              </select>
            </div>
             <div class="mb-3">
                            <label for="no_kamar" class="form-label">Tanggal Bayar Berikutnya</label>
                            <input type="date" name="tanggal_bayar" class="form-control" id="tanggal_bayar" value="{{ $data->tanggal_bayar }}" onkeyup="sewa()">
                          </div>
                          <div class="mb-3">
                            <label for="no_kamar" class="form-label">Total bayar</label>
                            <input type="text" name="total_bayar" class="form-control" id="total_bayar" value="{{ $data->total_bayar }}" onkeyup="sewa()">
                          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
  function add() {
       
       var no_kamar = document.getElementById('no_kamar').value;
       var result = parseInt(no_kamar);
  
        if (result<=10) {
           document.getElementById('tipe_kamar').value = "Kamar Mandi Dalam" ;
           document.getElementById('harga_kamar').value = 750000 ;
        } else if (10<result<=25) {
          document.getElementById('tipe_kamar').value = "Kamar Mandi Luar" ;
          document.getElementById('harga_kamar').value = 600000;
        } else {
         document.getElementById('tipe_kamar').value = "Salah Input Nomor Kamar" ;
         document.getElementById('harga_kamar').value = 0;
        }
  }
  function addMonths(date, months) {
      var d = date.getDate();
      date.setMonth(date.getMonth() + +months);
      if (date.getDate() != d) {
        date.setDate(0);
      }
      return date;
  }
  function addYears(date, years) {
      var d = date.getDate();
      date.setYear(date.getFullYear() + +years);
      if (date.getDate() != d) {
        date.setDate(0);
      }
      return date;
  }
  function sewa(){
    var sewa = document.getElementById('sewa').value;
    var harga = document.getElementById('harga_kamar').value;
    const date = new Date();
    if(sewa==='bulanan'){
      document.getElementById("tanggal_bayar").value = addMonths(date, 1).toISOString().substr(0, 10);
      document.getElementById("total_bayar").value= harga *1;
    } else {
      document.getElementById("tanggal_bayar").value = addYears(date, 1).toISOString().substr(0, 10);
      document.getElementById("total_bayar").value= harga *12;
    }
  }
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sewa').addEventListener('change',sewa);
  }, false);
  
  function showPassword(){
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  
  </script>