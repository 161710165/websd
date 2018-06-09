<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $kategoris = kategori::all();
        return view('kategori.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'judul' => 'required|'
        ]);
        $kategoris = new kategori;
        $kategoris->judul = $request->judul;
        $kategoris->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $kategoris = kategori::findOrFail($id);
        return view('kategori.show',compact('kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = kategori::findOrFail($id);
        return view('kategori.edit',compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $this->validate($request,[
            'judul' => 'required|'
        ]);
        $kategoris = kategori::findOrFail($id);
        $kategoris->judul = $request->judul;
        $kategoris->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $kategori,$id)
    {
        $kategoris = kategori::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('kategori.index');
    }    }
