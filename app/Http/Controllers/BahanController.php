<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Bahan;
use App\Models\KodePenyimpanan;
use App\Models\Satuan;
use Illuminate\Http\Request;
use PDF;
class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        return view('bahan.index',compact('bahan'));
    }
    public function cetak()
    {
        $bahan = Bahan::all();
        $pdf = PDF::loadview('bahan.cetak',compact('bahan'));
    	return $pdf->stream('bahan.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = Satuan::all();
        $alat = Alat::all();
        $kode = KodePenyimpanan::all();
        return view('bahan.create',compact('satuan','alat','kode'));
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
            'bahan_kode' => 'required|unique:bahan,bahan_kode',
            'nama_bahan' => 'required',
            'alat_id' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'kode_penyimpanan_id' => 'required',
            'limit' => 'required',
         ]);
         $bahan = Bahan::create($request->all());
         return redirect()->route('bahan.index')->with('success','berhasil menambah bahan');
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
        $satuan = Satuan::all();
        $alat = Alat::all();
        $kode = KodePenyimpanan::all();
        $bahan = Bahan::find($id);
        return view('bahan.edit',compact('bahan','satuan','alat','kode'));
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
            
            'nama_bahan' => 'required',
            'alat_id' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'kode_penyimpanan_id' => 'required',
            'limit' => 'required',
         ]);
         $data = $request->all();
         $bahan = Bahan::find($id);
         $bahan->update($data);
         return redirect()->route('bahan.index')->with('success','berhasil mengupdate bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::find($id);
        $bahan->delete();
        return redirect()->route('bahan.index')->with('success','berhasil menghapus bahan');
    }
}
