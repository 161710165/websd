<?php

namespace App\Http\Controllers;

use App\berita;
use App\kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = berita::with('kategori')->get();
        return view('berita.index',compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('berita.create',compact('kategoris'));
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
            'kategori_id' => 'required|',
            'konten' => 'required',
        ]);
        $beritas = new berita;
        $beritas->kategori_id = $request->kategori_id;
        $beritas->konten = $request->konten;
        $beritas->save();
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beritas = berita::findOrFail($id);
        return view('berita.show',compact('beritas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beritas = berita::findOrFail($id);
        $kategoris = kategori::all();
        $selectedkategori = berita::findOrFail($id)->kategori_id;
        return view('berita.edit',compact('beritas','kategoris','selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $this->validate($request,[
            'kategori_id' => 'required|',
            'konten' => 'required'
        ]);
        $beritas = berita::findOrFail($id);
        $beritas->kategori_id = $request->kategori_id;
        $beritas->konten = $request->konten;
        $beritas->save();
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beritas = berita::findOrFail($id);
        $beritas->delete();
        return redirect()->route('berita.index');
    }
}
