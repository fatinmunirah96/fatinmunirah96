<?php

namespace App\Http\Controllers;

use App\Models\KodAgensibil;
use Illuminate\Http\Request;

class KodAgensibilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kod_agensibilArray = KodAgensibil::paginate(20);
        return view('kod_agensibil.index',compact('kod_agensibilArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kod_agensibil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([//warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_agensibil' => 'required|min:1|unique:kod_agensibil',//senarai field
            'agensibil' => 'required|min:3|unique:kod_agensibil',//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_agensibil' => 'Kod Agensibil',
            'agensibil' => 'Agensibil',
        ]);

        KodAgensibil::create($request->all());


        return redirect()
            ->route('kod_agensibil.index')
            ->with('success','Maklumat agensi telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodAgensibil  $kodAgensibil
     * @return \Illuminate\Http\Response
     */
    public function show(KodAgensibil $kodAgensibil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodAgensibil  $kodAgensibil
     * @return \Illuminate\Http\Response
     */
    public function edit(KodAgensibil $kodAgensibil)
    {
        //
        $kod_agensibil=$kodAgensibil;
        return view('kod_agensibil.edit', compact('kod_agensibil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodAgensibil  $kodAgensibil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodAgensibil $kodAgensibil)
    {
        //
        $request->validate([
            //warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_agensibil' => 'required|min:1|unique:kod_agensibil,id_agensibil,'.$kodAgensibil->id,//senarai field
            'agensibil' => 'required|min:3|unique:kod_agensibil,agensibil,'.$kodAgensibil->id,//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_agensibil' => 'Kod agensibil',
            'agensibil' => 'agensibil',
        ]);

        $kodAgensibil->update($request->all());


        return redirect()
            ->route('kod_agensibil.index')
            ->with('success','Maklumat agensi telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodAgensibil  $kodAgensibil
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodAgensibil $kodAgensibil)
    {
        //
        $kodAgensibil->delete();

        return redirect()
        ->route('kod_agensibil.index')
        ->with('success','Maklumat agensi telah berjaya dihapuskan');
    }
}
