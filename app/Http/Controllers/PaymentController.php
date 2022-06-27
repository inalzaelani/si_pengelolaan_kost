<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Occupant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $data = DB::table('payments')
            ->join('occupants', 'occupants.no_kamar', '=', 'payments.no_kamar')
            ->get();
        return view('pembayaran.datapembayaran')->with('data', $data);
    }

    public function exportpdf()
    {
        $data =  DB::table('payments')
            ->join('occupants', 'occupants.no_kamar', '=', 'payments.no_kamar')
            ->get();

        view()->share('data', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pembayaran.datapembayaran-pdf');
        return $pdf->download('datapembayaran.pdf');
    }


    public function tampilpembayaran($id)
    {
        $data = Occupant::find($id);

        return view('pembayaran.konfirmasipembayaran', compact('data'));
    }

    public function updatepembayaran(Request $request, $id)
    {
        $data =  Occupant::find($id);
        $data->update($request->all());

        return redirect()->route('pembayaran')->with('success', 'Data Berhasil Dikonfirmasi');
    }

    public function tampilpembayaranpenghuni($id)
    {
        $data = DB::table('payments')
            ->join('occupants', 'occupants.no_kamar', '=', 'payments.no_kamar')
            ->get();
        return view('pembayaran.tambahpembayaran')->with('data', $data);
    }

    public function insertpembayaran(Request $request)
    {
        $data = Payment::create(
            [
                "no_kamar" => $request->no_kamar,
                "bukti_pembayaran" => $request->hasFile('bukti_pembayaran'),
            ],
        );
        if ($request->hasFile('bukti_pembayaran')) {
            $request->file('bukti_pembayaran')->move('buktipembayaran/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $data->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $data->save();
        }

        return redirect('dashboardpenghuni')->with('success', 'Data Berhasil Ditambahkan!');
    }
}
