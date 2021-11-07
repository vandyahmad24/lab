<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBahan;
use Illuminate\Http\Request;

class PermintaanBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pb = PermintaanBahan::all();
        return view('permintaan-bahan.index',compact('pb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permintaan-bahan.create');
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
            'nama' => 'required',
            'merek' => 'required',
            'satuan' => 'required',
            'kebutuhan' => 'required',
         ]);
         PermintaanBahan::create($request->all());
         return redirect()->route('permintaan-bahan.index')->with('success','berhasil menambah permintaan bahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = PermintaanBahan::find($id);
        return view('permintaan-bahan.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = PermintaanBahan::find($id);
        return view('permintaan-bahan.edit',compact('p'));
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
            'nama' => 'required',
            'merek' => 'required',
            'satuan' => 'required',
            'kebutuhan' => 'required',
         ]);
        $data =$request->all();
        $p = PermintaanBahan::find($id);
        $p->update($data);
        return redirect()->route('permintaan-bahan.index')->with('success','berhasil mengupdate permintaan bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p=PermintaanBahan::find($id);
        $p->delete();
        return redirect()->route('permintaan-bahan.index')->with('success','berhasil menghapus permintaan bahan');
    }
    public function truncate()
    {
        // dd("halo");
        PermintaanBahan::truncate();
        return redirect()->route('permintaan-bahan.index')->with('success','berhasil mereset permintaan bahan');
    }
    public function cetak()
    {
        dd("halo");
      
    }
}
