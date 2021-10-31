<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\DataKerusakan;
use App\Models\JadwalPemeliharaan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class DataKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerusakan = DataKerusakan::all();
        return view('data-kerusakan.index',compact('kerusakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::all();
        $pic = Alat::all();
        return view('data-kerusakan.create',compact('alat','pic'));
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
            'pic_id' => 'required',
            'tanggal_temuan' => 'required',
            'jenis_kerusakan' => 'required',
            'akibat' => 'required',
            'faktor' => 'required',
            'rencana' => 'required',
            'foto' => 'required',
         ]);
        $data = $request->all();
        $file = $request->file('foto');
        $rand = Str::random("10");
        $nama = $rand.".".$file->getClientOriginalExtension();
		$tujuan_upload = "upload";
		$file->move($tujuan_upload,$nama);
        $data["foto"]=$nama;
        DataKerusakan::create($data);
        return redirect()->route('data-kerusakan.index')->with('success','berhasil Membuat Data Kerusakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kerusakan= DataKerusakan::find($id);
        return view('data-kerusakan.show',compact('kerusakan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kerusakan= DataKerusakan::find($id);
        $alat = Alat::all();
        $pic = Alat::all();
        return view('data-kerusakan.edit',compact('kerusakan','alat','pic'));
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
            'pic_id' => 'required',
            'tanggal_temuan' => 'required',
            'jenis_kerusakan' => 'required',
            'akibat' => 'required',
            'faktor' => 'required',
            'rencana' => 'required',
         ]);
        $data = $request->all();
        if($request->file('foto')){
            $file = $request->file('foto');
            $rand = Str::random("10");
            $nama = $rand.".".$file->getClientOriginalExtension();
            $tujuan_upload = "upload";
            $file->move($tujuan_upload,$nama);
            $data["foto"]=$nama;
        }
        $r=DataKerusakan::find($id);
        $r->update($data);
        return redirect()->route('data-kerusakan.index')->with('success','berhasil mengupdate Data Kerusakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerusakan= DataKerusakan::find($id);
        $kerusakan->delete();
        return redirect()->route('data-kerusakan.index')->with('success','berhasil Menghapus Data Kerusakan');
    }
}
