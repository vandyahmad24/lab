<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Pic;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        $pic = Pic::all();
        return view('master.index', compact('kategori','lokasi', 'pic'));
    }
    public function addKategori()
    {
        return view('master.add-kategori');
    }
    public function postKategori(Request $request)
    {
        $data = $request->all();
        // dd($data);
        Kategori::create($data);
        return redirect()->route('master')->with('successkategori','berhasil membuat kategori data');
    }
    public function editKategori($id)
    {
        $kategori = Kategori::find($id);
        return view('master.edit-kategori', compact('kategori'));
    }
    public function putKategori($id, Request $request)
    {
        $kategori = Kategori::find($id);
        $kategori->nama=$request->nama;
        $kategori->save();
        return redirect()->route('master')->with('successkategori','berhasil mengupdate kategori data');
    }
    public function deleteKategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('master')->with('successkategori','berhasil menghapus kategori data');
    }
    public function addLokasi()
    {
        return view('master.add-lokasi');
    }
    public function postLokasi(Request $request)
    {
        $data = $request->all();
        // dd($data);
        Lokasi::create($data);
        return redirect()->route('master')->with('successlokasi','berhasil membuat Lokasi data');
    }
    public function editLokasi($id)
    {
        $lokasi = Lokasi::find($id);
        return view('master.edit-lokasi', compact('lokasi'));
    }
    public function putLokasi($id, Request $request)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->nama=$request->nama;
        $lokasi->save();
        return redirect()->route('master')->with('successlokasi','berhasil mengupdate lokasi data');
    }
    public function deleteLokasi($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();
        return redirect()->route('master')->with('successkategori','berhasil menghapus kategori data');
    }
    
}
