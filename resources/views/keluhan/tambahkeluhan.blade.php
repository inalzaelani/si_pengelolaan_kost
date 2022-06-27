@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')

    
    <div class="row justify-content-center">
      <h1 class="justify-content-center">Keluhan Penghuni {{ Auth::guard('occupant')->user()->nama }}</h1>
        <div class="col-8">
            <div class="card">
                <div class="cardbody">
                    <form action="/insertkeluhan/{{ Auth::guard('occupant')->user()->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="no_kamar" class="form-label">Nomor Kamar</label>
                            <input type="number" name="no_kamar" class="form-control" id="no_kamar" value="{{ Auth::guard('occupant')->user()->no_kamar }}" onkeyup="" required>
                          </div>
                          <div class="mb-3">
                            <label for="no_kamar" class="form-label">Detail Keluhan</label>
                            <input type="text" name="keluhan" class="form-control" id="keluhan" value="" onkeyup="" required>
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Upload Bukti Keluhan</label>
                            <input type="file" name="bukti_keluhan" class="form-control"  value="" required>
                          </div>
                         
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

