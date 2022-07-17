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
        $data = DB::table('complaints')
            ->join('occupants', 'occupants.id', '=', 'complaints.id')
            ->get();
        return view('keluhan.tambahkeluhan')->with('data', $data);
    }

    public function insertkeluhan(Request $request, $id)
    {
        $data = Complaint::find($id);
        $data->update($request->all());
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
