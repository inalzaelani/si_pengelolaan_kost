<?php

namespace App\Http\Controllers;


use App\Models\Occupant;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class OccupantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Occupant::where('no_kamar', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $data = Occupant::paginate(10);
        }

        return view('datapenghuni.datapenghuni', compact('data'));
    }

    public function tambahpenghuni()
    {
        return view('datapenghuni.tambahpenghuni');
    }

    public function insertdata(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required|unique:occupants,no_kamar,' . $request->id,
            'username' => 'required|unique:occupants,username,' . $request->id,
        ]);

        $data = Occupant::create(
            [
                "username" => $request->username,
                "password" => bcrypt($request->password),
                "level" => $request->input('level'),
                "nama" => $request->nama,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_telp" => $request->no_telp,
                "no_kamar" => $request->no_kamar,
                "tipe_kamar" => $request->tipe_kamar,
                "harga_kamar" => $request->harga_kamar,
                "bukti_identitas" => $request->hasFile('bukti_identitas'),
                "sewa" => $request->sewa,
                "tanggal_bayar" => $request->tanggal_bayar,
                "total_bayar" => $request->total_bayar,



            ],
        );


        if ($request->hasFile('bukti_identitas')) {
            $request->file('bukti_identitas')->move('buktiidentitas/', $request->file('bukti_identitas')->getClientOriginalName());
            $data->bukti_identitas = $request->file('bukti_identitas')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('penghuni')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function details($id)
    {
        $data = Occupant::find($id);
        return view('datapenghuni.detailpenghuni', compact('data'));
    }

    public function tampilkandata($id)
    {
        $data = Occupant::find($id);
        return view('datapenghuni.editpenghuni', compact('data'));
    }

    public function tampilkandatadiri($id)
    {
        $data = Occupant::find($id);

        return view('editdatadiri', compact('data'));
    }


    public function updatedata(Request $request, $id)
    {

        $data = Occupant::find($id);
        $data->update($request->all());

        return redirect()->route('penghuni')->with('success', 'Data Berhasil Diupdate');
    }

    public function updatedatadiri(Request $request, $id)
    {
        $data = Occupant::find($id);
        $data->update([
            "username" => $request->username,
            "password" => bcrypt($request->password),
            "jenis_kelamin" => $request->jenis_kelamin,
            "no_telp" => $request->no_telp,
        ]);

        return redirect('/dashboardpenghuni')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $data = Occupant::find($id);
        $data->delete();

        return redirect()->route('penghuni')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf()
    {
        $data = Occupant::all();

        view()->share('data', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('datapenghuni.datapenghuni-pdf');
        return $pdf->download('datapenghuni.pdf');
    }
}