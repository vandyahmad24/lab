<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\PenggunaanBahan;
use Illuminate\Http\Request;

class PenggunaanBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaan = PenggunaanBahan::all();
        return view('penggunaan.index',compact('penerimaan'));
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
        return view('penggunaan.create',compact('bahan'));
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
            'bahan_id' => 'required',
            'tanggal_digunakan' => 'required',
            'jumlah_digunakan' => 'required|numeric',
         ]);
         $data = $request->all();
         PenggunaanBahan::create($data);
         $bahan = Bahan::find($request->bahan_id);
         $sNow = $bahan->stok;
         $pen = $request->jumlah_digunakan;
         $hasil = $sNow-$pen;
         if($hasil <0){
            return redirect()->route('penggunaan-bahan.create')->with('error','stok tidak mencukupi');
         }
         $bahan->stok = $hasil;
         $bahan->save();
         return redirect()->route('penggunaan-bahan.index')->with('success','berhasil membuat penggunaan bahan');
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
        $pen = PenggunaanBahan::find($id);
        $bahan = Bahan::find($pen->bahan_id);
        return view('penggunaan.edit',compact('pen','bahan'));
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
            'tanggal_digunakan' => 'required',
         ]);
         $data = $request->all();
         $pen = PenggunaanBahan::find($id);
         $pen->update($data);
         return redirect()->route('penggunaan-bahan.index')->with('success','berhasil mengupdate penggunaan bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pen = PenggunaanBahan::find($id);
        $pen->delete();
        return redirect()->route('penggunaan-bahan.index')->with('success','berhasil menghapus penggunaan bahan');
    }
}
