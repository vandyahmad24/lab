<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\DataPerbaikan;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class DataPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perbaikan = DataPerbaikan::all();
        return view('data-perbaikan.index',compact('perbaikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::all();
        $pic= Alat::all();
        return view('data-perbaikan.create',compact('alat','pic'));
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
            'tanggal_perbaikan' => 'required',
            'jenis_kerusakan' => 'required',
            'jenis_perbaikan' => 'required',
            'vendor' => 'required',
            'bukti_perbaikan' => 'required',
            'kondisi_alat'=>'required',
         ]);
         $alat = Alat::find($request->alat_id);
        $data = $request->all();
        $data['pic_id']=$alat->pic_id;
        $file = $request->file('bukti_perbaikan');
        $rand = Str::random("10");
        $nama = $rand.".".$file->getClientOriginalExtension();
		$tujuan_upload = "upload";
		$file->move($tujuan_upload,$nama);
        $data["bukti_perbaikan"]=$nama;
        DataPerbaikan::create($data);
        return redirect()->route('data-perbaikan.index')->with('success','berhasil Membuat Data Perbaikan');
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
        $alat = Alat::all();
        $perbaikan = DataPerbaikan::find($id);
        return view('data-perbaikan.edit',compact('perbaikan','alat'));

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
            'tanggal_perbaikan' => 'required',
            'jenis_kerusakan' => 'required',
            'jenis_perbaikan' => 'required',
            'vendor' => 'required',
            'kondisi_alat'=>'required',
         ]);
         $alat = Alat::find($request->alat_id);
        $data = $request->all();
        $data['pic_id']=$alat->pic_id;
        if($request->file('bukti_perbaikan')){
            $file = $request->file('bukti_perbaikan');
            $rand = Str::random("10");
            $nama = $rand.".".$file->getClientOriginalExtension();
            $tujuan_upload = "upload";
            $file->move($tujuan_upload,$nama);
            $data["bukti_perbaikan"]=$nama;
        }
      
        $d = DataPerbaikan::find($id);
        $d->update($data);
        return redirect()->route('data-perbaikan.index')->with('success','berhasil Mengupdate Data Perbaikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $j = DataPerbaikan::find($id);
        // dd($j);
        $j->delete();
        return redirect()->route('data-perbaikan.index')->with('success','berhasil Menghapus Data Perbaikan');
    }
}
