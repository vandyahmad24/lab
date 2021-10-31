<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("Halo");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.add-pic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Pic::create($data);
        return redirect()->route('master')->with('successpic','berhasil membuat pic data');
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
        $pic = Pic::find($id);
        return view('master.edit-pic',compact('pic'));
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
        $pic=Pic::find($id);
        $pic->nama=$request->nama;
        $pic->save();
        return redirect()->route('master')->with('successpic','berhasil diubah pic data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pic=Pic::find($id);
        $pic->delete();
        return redirect()->route('master')->with('successpic','berhasil dihapus pic data');
    }
}
