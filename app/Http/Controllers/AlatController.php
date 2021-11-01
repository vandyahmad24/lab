<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alat = Alat::all();
        return view('alat.index',compact('alat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pic=Pic::all();
        $lokasi=Lokasi::all();
        $kategori=Kategori::all();
        return view('alat.create', compact('pic','lokasi','kategori'));
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alat_kode' => 'required|unique:alat,alat_kode',
            'komponen_alat'=>'required',
            'bahan_habis_pakai'=>'required'
         ]);
         $file = $request->file('foto');
         $rand = Str::random("10");
        $nama = $rand.".".$file->getClientOriginalExtension();
		$tujuan_upload = "upload";
		$file->move($tujuan_upload,$nama);
        $data = $request->all();
        $data["foto"]=$nama;
        Alat::create($data);
        return redirect()->route('alat.index')->with('success','berhasil menambah alat ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alat = Alat::find($id);
        return view('alat.show', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alat = Alat::find($id);
        // dd($alat);
        $pic=Pic::all();
        $lokasi=Lokasi::all();
        $kategori=Kategori::all();
        return view('alat.edit', compact('alat','pic','lokasi','kategori'));
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
         $alat = Alat::where("alat_kode",$id)->first();
        
         $data = $request->all();
         if($request->file('foto')){
            $file=$request->file('foto');
            $rand = Str::random("10");
            $nama = $rand.".".$file->getClientOriginalExtension();
            $tujuan_upload = "upload";
            $file->move($tujuan_upload,$nama);
            $data["foto"]=$nama;
         }
         
         $alat->update($data);
         return redirect()->route('alat.index')->with('success','berhasil mengupdate alat ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alat = Alat::find($id);
        $alat->delete();
        return redirect()->route('alat.index')->with('success','berhasil menghapus alat ');
        
    }
}
