<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\JadwalPemeliharaan;
use App\Models\Pic;
use Illuminate\Http\Request;

class JadwalPemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalPemeliharaan::where('status_pelaksanaan','!=','selesai')->get();
        // dd($jadwal);
        return view('jadwal-pemeliharaan.index',compact('jadwal'));
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
        return view('jadwal-pemeliharaan.create',compact('alat','pic'));
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
            'tanggal_pemeliharaan' => 'required',
            'pic_id' => 'required',
         ]);
         $data = $request->all();
         $alat=Alat::find($request->alat_id);
         $data['pic_id']=$alat->pic_id;
         $data['status_pelaksanaan']="belum";
         JadwalPemeliharaan::create($data);
         return redirect()->route('jadwal-pemeliharaan.index')->with('success','berhasil Membuat jadwal pemeliharaan');
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
        $jadwal = JadwalPemeliharaan::find($id);
        $alat = Alat::all();
        $pic = Pic::all();
        return view('jadwal-pemeliharaan.edit',compact('alat','pic','jadwal'));
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
            'tanggal_pemeliharaan' => 'required',
            'pic_id' => 'required',
         ]);
         $data= $request->all();
         $alat=Alat::find($request->alat_id);
         $data['pic_id']=$alat->pic_id;
         $jadwal = JadwalPemeliharaan::find($id);
         $jadwal->update($data);
         return redirect()->route('jadwal-pemeliharaan.index')->with('success','berhasil Mengupdate jadwal pemeliharaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = JadwalPemeliharaan::find($id);
        $jadwal->delete();
        return redirect()->route('jadwal-pemeliharaan.index')->with('success','berhasil menghapus jadwal pemeliharaan');
    }
}
