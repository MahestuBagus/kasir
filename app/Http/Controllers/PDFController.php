<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function index()
    {
    	$pegawai = item::all();
    	return view('pegawai',['pegawai'=>$pegawai]);
    }
 
    public function cetak_pdf()
    {
    	$pegawai = item::all();
 
    	$pdf = PDF::loadview('pegawai_pdf',['pegawai'=>$pegawai]);
    	return $pdf->download('laporan-pegawai-pdf');
    }
}
