<?php

namespace App\Http\Controllers;

use App\guru;
USE App\File;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = guru::all();
        return view('guru.index',compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
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
            'nama_guru' => 'required|',
            'profil_guru' => 'required|',
            'nip' => 'required|',
            'jabatan' => 'required|'
        ]);
        $gurus = new guru;
        $gurus->nama_guru = $request->nama_guru;
        $gurus->profil_guru = $request->profil_guru;
        $gurus->nip = $request->nip;
        $gurus->jabatan = $request->jabatan;

        if ($request->hasFile('profil_guru')){
            $file=$request->file('profil_guru');
            $destinationPath=public_path() .DIRECTORY_SEPARATOR. 'assets/admin/images/icon';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces=$file->move($destinationPath,$filename);
            $gurus->profil_guru=$filename;
    }
    $gurus->save();
    return redirect()->route('guru.index');


    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gurus = guru::findOrFail($id);
        return view('guru.show',compact('gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $gurus = guru::findOrFail($id);
        return view('guru.edit',compact('gurus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_guru' => 'required|',
            'nip' => 'required|',
             'jabatan' => 'required|'
        ]);
        $gurus = guru::findOrFail($id);
        $gurus->nama_guru = $request->nama_guru;
        $gurus->profil_guru = $request->profil_guru;
        $gurus->nip = $request->nip;
        $gurus->jabatan = $request->jabatan;
        $gurus->save();
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gurus = guru::findOrFail($id);
        $gurus->delete();
        return redirect()->route('guru.index');
    }
}
