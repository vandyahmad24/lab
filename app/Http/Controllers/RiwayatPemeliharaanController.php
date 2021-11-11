<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\JadwalPemeliharaan;
use App\Models\Pic;
use PDF;
use Illuminate\Http\Request;

class RiwayatPemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("Halo");
        $jadwal = JadwalPemeliharaan::where('status_pelaksanaan','selesai')->get();
        return view('riwayat-pemeliharaan.index',compact('jadwal'));
    }

    public function cetak()
    {
        // dd("Halo");
        $jadwal = JadwalPemeliharaan::where('status_pelaksanaan','selesai')->get();
        $pdf = PDF::loadview('riwayat-pemeliharaan.cetak',compact('jadwal'));
    	return $pdf->stream('riwayat-pemeliharaan.pdf');
        // return view('riwayat-pemeliharaan.index',compact('jadwal'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::all();
        $pic = Pic::all();
        return view('riwayat-pemeliharaan.create',compact('alat','pic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'alat_id' => 'required',
            'jenis_pemeliharaan' => 'required',
            'tanggal_pengecekan' => 'required',
            'kondisi_alat' => 'required',
         ]);
         $jenis_pemeliharaan = implode(",",$request->jenis_pemeliharaan);
        //  dd($jenis_pemeliharaan);
         $alat = Alat::find($request->alat_id);
         $data = $request->all();
         $data["tanggal_pemeliharaan"]=$request->tanggal_pengecekan;
         $data["status_pelaksanaan"]="selesai";
         $data["pic_id"]=$alat->pic_id;
        //  $data["tanggal_pengecekan"]=$request->tanggal_pengecekan;
         $data["jenis_pemeliharaan"]=$jenis_pemeliharaan;
        //  dd($data);
         JadwalPemeliharaan::create($data);
         return redirect()->route('riwayat-pemeliharaan.index')->with('success','berhasil Mengupdate Riwayat Pemeliharaan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = JadwalPemeliharaan::find($id);
        $alat = Alat::all();
        $pic = Pic::all();
        return view('riwayat-pemeliharaan.edit',compact('alat','pic','jadwal'));
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
            'jenis_pemeliharaan' => 'required',
            'tanggal_pengecekan' => 'required',
            'kondisi_alat' => 'required',
         ]);
         $alat = Alat::find($request->alat_id);
         $jenis_pemeliharaan = implode(",",$request->jenis_pemeliharaan);
         $data=$request->all();
         $data["pic_id"]=$alat->pic_id;
         $data["jenis_pemeliharaan"]=$jenis_pemeliharaan;
         $jadwal= JadwalPemeliharaan::find($id);
         $jadwal->update($data);
         return redirect()->route('riwayat-pemeliharaan.index')->with('success','berhasil Mengupdate Riwayat pemeliharaan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $j = JadwalPemeliharaan::find($id);
        $j->delete();
        return redirect()->route('riwayat-pemeliharaan.index')->with('success','berhasil Menghapus Riwayat pemeliharaan');
    }
}
