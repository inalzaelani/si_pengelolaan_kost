@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')

<div class="container">
   <div class="row justify-content-center">
    {{-- <div class="container justify-content-center"">
      <h1 class="">Pembayaran Sewa Penghuni {{ Auth::guard('occupant')->user()->nama }}</h1>
    </div> --}}
        <div class="col-8 mt-3">
          <h1 class="">Pembayaran Sewa Penghuni {{ Auth::guard('occupant')->user()->nama }}</h1>
            <div class="card">
              <h4 class="justify-content-center">Transfer ke No Rekening XXXXXXXXXXXXX <br> Bank XXX atas nama XXXX sebesar Rp. {{number_format(Auth::guard('occupant')->user()->total_bayar,0,',','.')  }} </h4>
                <div class="cardbody">
                    <form action="/insertpembayaran/{{ Auth::guard('occupant')->user()->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="no_kamar" class="form-label">Nomor Kamar</label>
                            <input type="number" name="no_kamar" class="form-control" id="no_kamar" value="{{ Auth::guard('occupant')->user()->no_kamar }}" onkeyup="" required>
                          </div> --}}
                          <div class="mb-3">
                            <label for="" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" class="form-control"  value="" required>
                          </div>
                         
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>   
@endsection

