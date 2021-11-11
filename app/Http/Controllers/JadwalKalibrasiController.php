<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\JadwalKalibrasi;
use Illuminate\Http\Request;
use PDF;

class JadwalKalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalKalibrasi::where('status_kalibrasi','!=','selesai')->with('alat')->get();
        // dd($jadwal);
        return view('jadwal-kalibrasi.index',compact('jadwal'));
    }
    public function cetak()
    {
        // dd("halo");
        $jadwal = JadwalKalibrasi::where('status_kalibrasi','!=','selesai')->with('alat')->get();
        // dd($jadwal);
        $pdf = PDF::loadview('jadwal-kalibrasi.cetak',compact('jadwal'));
    	return $pdf->stream('jadwal-kalibrasi.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat =  Alat::all();
        return view('jadwal-kalibrasi.create',compact('alat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'alat_id' => 'required',
            'jenis_kalibrasi' => 'required',
            'tanggal_kalibrasi' => 'required',
            'status_kalibrasi' => 'required',
         ]);
        //  dd($request->status_kalibrasi);
        $data = $request->all();
        // dd($alat);
        JadwalKalibrasi::create($data);
        return redirect()->route('jadwal-kalibrasi.index')->with('success','berhasil Membuat jadwal kalibrasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = JadwalKalibrasi::find($id);
        $alat=Alat::all();
        return view('jadwal-kalibrasi.edit',compact('alat','jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'alat_id' => 'required',
            'jenis_kalibrasi' => 'required',
            'tanggal_kalibrasi' => 'required',
            'status_kalibrasi' => 'required',
         ]);
         $data = $request->all();
         $alat = JadwalKalibrasi::findOrFail($id);
         $alat->update($data);
         return redirect()->route('jadwal-kalibrasi.index')->with('success','berhasil Mengupdate jadwal kalibrasi');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $j = JadwalKalibrasi::find($id);
        $j->delete();
        return redirect()->route('jadwal-kalibrasi.index')->with('success','berhasil Menghapus jadwal kalibrasi');

    }
}
