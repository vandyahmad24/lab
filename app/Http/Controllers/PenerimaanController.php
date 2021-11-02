<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\PenerimaanBahan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaan = PenerimaanBahan::all();
        return view('penerimaan.index',compact('penerimaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahan = Bahan::all();
        // foreach($bahan as $b){
        //     dd($b);
        // }
        // dd($bahan->alat->nama);
        return view('penerimaan.create',compact('bahan'));
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
            'bahan_id' => 'required',
            'tanggal_penerimaan' => 'required',
            'jumlah_diterima' => 'required',
         ]);
         $data = $request->all();
         PenerimaanBahan::create($data);
         $bahan = Bahan::find($request->bahan_id);
         $sNow = $bahan->stok;
         $pen = $request->jumlah_diterima;
         $bahan->stok = $sNow-$pen;
         $bahan->save();
         return redirect()->route('penerimaan-bahan.index')->with('success','berhasil membuat penerimaan bahan');
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
        $pen = PenerimaanBahan::find($id);
        $bahan = Bahan::find($pen->bahan_id);
        return view('penerimaan.edit',compact('pen','bahan'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
