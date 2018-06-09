
<?php

namespace App\Http\Controllers;

use App\ekskul;
use App\fasilitas;
use App\guru;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ekskuls = ekskul::with('guru')->get();
        $ekskuls = ekskul::with('fasilitas')->get();
        return view('ekskul.index',compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurus = guru::all();
        $fasilitas = fasilitas::all();
         return view('ekskul.create',compact('gurus','fasilitas'));
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
            'nama_ekskul' => 'required|',
            'guru_id' => 'required|',
            'fasilitas_id' => 'required'
        ]);
        $ekskuls = new ekskul;
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->guru_id = $request->guru_id;
        $ekskuls->fasilitas_id = $request->fasilitas_id;
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ekskuls = ekskul::findOrFail($id);
        return view('ekskul.show',compact('ekskuls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ekskuls = ekskul::findOrFail($id);
         $gurus = guru::all();
         $selectedguru = ekskul::findOrFail($id)->guru_id;
         $fasilitas = fasilitas::all();
         $selectedfasilitas = ekskul::findOrFail($id)->fasilitas_id;
        return view('ekskul.edit',compact('ekskuls','gurus','selectedguru','fasilitas','selectedfasilitas')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request,[
            'nama_ekskul' => 'required|',
            'guru_id' => 'required|',
            'fasilitas_id' => 'required'
        ]);
        $ekskuls = ekskul::findOrFail($id);
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->guru_id = $request->guru_id;
        $ekskuls->fasilitas_id = $request->fasilitas_id;
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekskuls = ekskul::findOrFail($id);
        $ekskuls->delete();
        return redirect()->route('ekskul.index');
    }
}
