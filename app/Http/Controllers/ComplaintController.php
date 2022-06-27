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
            ->join('occupants', 'occupants.no_kamar', '=', 'complaints.no_kamar')
            ->get();
        return view('keluhan.datakeluhan')->with('data', $data);
    }

    public function tampilkeluhan($id)
    {
        $data = DB::table('complaints')
            ->join('occupants', 'occupants.no_kamar', '=', 'complaints.no_kamar')
            ->get();
        return view('keluhan.tambahkeluhan')->with('data', $data);
    }

    public function insertkeluhan(Request $request)
    {
        $data = Complaint::create(
            [
                "no_kamar" => $request->no_kamar,
                "bukti_keluhan" => $request->hasFile('bukti_keluhan'),
                "keluhan" => $request->keluhan,
            ],
        );
        if ($request->hasFile('bukti_keluhan')) {
            $request->file('bukti_keluhan')->move('buktikeluhan/', $request->file('bukti_keluhan')->getClientOriginalName());
            $data->bukti_keluhan = $request->file('bukti_keluhan')->getClientOriginalName();
            $data->save();
        }

        return redirect('dashboardpenghuni')->with('success', 'Data Berhasil Ditambahkan!');
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
}
