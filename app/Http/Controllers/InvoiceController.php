<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $data = Invoice::find($id);
        return view('pembayaran.invoicepembayaran', compact('data'));
    }

    public function exportpdf($id)
    {
        $data = Invoice::find($id);

        view()->share('data', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pembayaran.invoicepembayaran-pdf', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
