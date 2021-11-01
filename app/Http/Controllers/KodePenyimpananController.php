<?php

namespace App\Http\Controllers;

use App\Models\KodePenyimpanan;
use Illuminate\Http\Request;

class KodePenyimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodepenyimpanan = KodePenyimpanan::all();
        return view('master.kode-penyimpanan.index',compact('kodepenyimpanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.kode-penyimpanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        KodePenyimpanan::create($data);
        return redirect()->route('kode-penyimpanan.index')->with('success','berhasil membuat kode penyimpanan data');
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
        $kode = KodePenyimpanan::find($id);
        return view('master.kode-penyimpanan.edit', compact('kode'));
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
        $data = $request->all();
        $kode = KodePenyimpanan::find($id);
        $kode->update($data);
        return redirect()->route('kode-penyimpanan.index')->with('success','berhasil menyimpan kode penyimpanan data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kode = KodePenyimpanan::find($id);
        $kode->delete();
        return redirect()->route('kode-penyimpanan.index')->with('success','berhasil menghapus kode penyimpanan data');
    }
}
