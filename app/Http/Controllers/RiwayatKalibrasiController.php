<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\JadwalKalibrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class RiwayatKalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalKalibrasi::where('status_kalibrasi','selesai')->with('alat')->get();
        return view('riwayat-kalibrasi.index',compact('jadwal'));
    }
    public function cetak()
    {
        $jadwal = JadwalKalibrasi::where('status_kalibrasi','selesai')->with('alat')->get();
        $pdf = PDF::loadview('riwayat-kalibrasi.cetak',compact('jadwal'));
    	return $pdf->stream('riwayat-kalibrasi.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jadwal = JadwalKalibrasi::find($id);
        $alat = Alat::all();
        return view('riwayat-kalibrasi.store',compact('alat'));
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
            'remark' => 'required',
            'sertifikat' => 'required',
         ]);
        $data=$request->all();
        $file=$request->file('sertifikat');
        $rand = Str::random("10");
        $nama = $rand.".".$file->getClientOriginalExtension();
        $tujuan_upload = "upload";
        $file->move($tujuan_upload,$nama);
        $data["sertifikat"]=$nama;
        $data['status_kalibrasi']='selesai';

        JadwalKalibrasi::create($data);
        $alat = Alat::find($request->alat_id);
        $alat->kalibrasi = "Selesai kalibrasi - ".date("d/M/Y");
        $alat->save();
       
        return redirect()->route('riwayat-kalibrasi.index')->with('success','berhasil Membuat Riwayat kalibrasi');

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
        $alat = Alat::all();
        return view('riwayat-kalibrasi.edit',compact('jadwal','alat'));
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
        // dd($request->all());
        $this->validate($request,[
            'alat_id' => 'required',
            'jenis_kalibrasi' => 'required',
            'tanggal_kalibrasi' => 'required',
            'remark' => 'required',
            'sertifikat' => 'required',
         ]);
        $data=$request->all();
        $file=$request->file('sertifikat');
        $rand = Str::random("10");
        $nama = $rand.".".$file->getClientOriginalExtension();
        $tujuan_upload = "upload";
        $file->move($tujuan_upload,$nama);
        $data["sertifikat"]=$nama;

        $jadwal = JadwalKalibrasi::find($id);
       
        $jadwal->update($data);
        $alat = Alat::find($request->alat_id);
        $alat->kalibrasi = "Selesai kalibrasi - ".date("d/M/Y");
        $alat->save();
        return redirect()->route('riwayat-kalibrasi.index')->with('success','berhasil Mengupdate Riwayat kalibrasi');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $j = JadwalKalibrasi::find($id);
        $j->delete();
        return redirect()->route('riwayat-kalibrasi.index')->with('success','berhasil Menghapus Riwayat kalibrasi');
    }
}
