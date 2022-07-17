<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function index()
    {
        $data = DB::table('complaints')
            ->join('occupants', 'occupants.id', '=', 'complaints.id')
            ->get();
        return view('keluhan.datakeluhan')->with('data', $data);
    }

    public function tampilkeluhan($id)
    {
        $data = Complaint::find($id);
        return view('keluhan.tambahkeluhan')->with('data', $data);
    }

    public function insertkeluhan(Request $request, $id)
    {
        $data = Complaint::find($id);
        $data->update([
            'keluhan' => $request->keluhan,
            'bukti_keluhan'     => $request->hasFile('bukti_keluhan'),
            'status' => $request->status = "Belum Diperbaiki",
        ]);
        if ($request->hasFile('bukti_keluhan')) {
            $request->file('bukti_keluhan')->move('buktikeluhan/', $request->file('bukti_keluhan')->getClientOriginalName());
            $data->bukti_keluhan = $request->file('bukti_keluhan')->getClientOriginalName();
            $data->save();
        }

        return view('dashboardpenghuni')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function konfirmasikeluhan(Request $request, $id)
    {
        $data = Complaint::find($id);
        $data->update([
            'status' => $request->status = "Diperbaiki",
        ]);
        return redirect()->route('keluhan')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function exportpdf()
    {
        $data =  DB::table('complaints')
            ->join('occupants', 'occupants.no_kamar', '=', 'complaints.no_kamar')
            ->get();

        view()->share('data', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('keluhan.datakeluhan-pdf');
        return $pdf->download('datakeluhan.pdf');
    }

    public function hapuskeluhan(Request $request, $id)
    {
        $data = Complaint::find($id);
        $data->update([
            'keluhan' => $request->keluhan = 0,
            'bukti_keluhan' => $request->bukti_keluhan = 0,
            'status' => $request->status = "Belum Ada Keluhan",
        ]);

        return redirect()->route('keluhan');
    }
}
