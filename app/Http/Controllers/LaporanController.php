<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
       return view('laporan.equipment');
    }
    public function cetak(Request $request)
    {
        $tanggal_mulai=  $request->input('tanggal_mulai');
        $tanggal_selesai=  $request->input('tanggal_selesai');
        $filter=  $request->input('filter');
        switch ($filter) {
            case 'data_alat':
                $alat = Alat::latest()->get();
                $pdf = PDF::loadview('laporan.eq.alat',compact('alat'));
                
                // dd($alat);
                break;
            case 'riwayat_pemeliharaan':
                # code...
                break;
            case 'riwayat_kerusakan':
                # code...
                break;
            case 'riwayat_perbaikan':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        return $pdf->stream('laporan.pdf');
        // return view('laporan.equipment');
    }
}
