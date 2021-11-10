<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\JadwalKalibrasi;
use App\Models\JadwalPemeliharaan;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bahan = Bahan::orderBy('created_at')->get();
        $date = date("Y-m");
        $jadwal = JadwalKalibrasi::where('tanggal_kalibrasi',$date)->get();
        $pemeliharaan = JadwalPemeliharaan::whereMonth('tanggal_pemeliharaan', Carbon::now()->month)->orderBy('tanggal_pemeliharaan','desc')->get();
        // dd($pemeliharaan);

       
        // dd($date);
        // dd($jadwal);
        return view('beranda',compact('bahan','jadwal','pemeliharaan'));
    }
}
