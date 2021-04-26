<?php

namespace App\Http\Controllers;

use App\Models\Kod_gelaran;
use Illuminate\Http\Request;

class Kod_gelaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kod_gelaranArray = Kod_gelaran::paginate(20);
        return view('kod_gelaran.index',compact('kod_gelaranArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kod_gelaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Kod_gelaran::create($request->all());
        $request->validate([//warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_gelaran' => 'required|min:3|unique:kod_gelaran',//senarai field
            'gelaran' => 'required|min:3|unique:kod_gelaran',//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_gelaran' => 'Kod Gelaran',
            'gelaran' => 'Gelaran',
        ]);

        Kod_gelaran::create($request->all());


        return redirect()
            ->route('kod_gelaran.index')
            ->with('success','Maklumat gelaran telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kod_gelaran  $kod_gelaran
     * @return \Illuminate\Http\Response
     */
    public function show(Kod_gelaran $kod_gelaran)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kod_gelaran  $kod_gelaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kod_gelaran $kod_gelaran)
    {
        //
        return view('kod_gelaran.edit', compact ('kod_gelaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kod_gelaran  $kod_gelaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kod_gelaran $kod_gelaran)
    {
        //
        $request->validate([
            //warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_gelaran' => 'required|min:3|unique:kod_gelaran,id_gelaran,'.$kod_gelaran->id,//senarai field
            'gelaran' => 'required|min:3|unique:kod_gelaran,gelaran,'.$kod_gelaran->id,//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_gelaran' => 'Kod Gelaran',
            'gelaran' => 'Gelaran',
        ]);

        $kod_gelaran->update($request->all());


        return redirect()
            ->route('kod_gelaran.index')
            ->with('success','Maklumat gelaran telah berjaya dikemaskini');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kod_gelaran  $kod_gelaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kod_gelaran $kod_gelaran)
    {
        //
        $kod_gelaran->delete();

        return redirect()
        ->route('kod_gelaran.index')
        ->with('success','Maklumat gelaran telah berjaya dihapuskan');
    }
}
