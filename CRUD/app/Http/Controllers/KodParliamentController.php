<?php

namespace App\Http\Controllers;

use App\Models\KodParliament;
use Illuminate\Http\Request;

class KodParliamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kod_parliamentArray = Kodparliament::paginate(20);
        return view('kod_parliament.index',compact('kod_parliamentArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kod_parliament.create');
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
            'id_parliament' => 'required|min:3|unique:kod_parliament',//senarai field
            'parliament' => 'required|min:3|unique:kod_parliament',//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_parliamentn' => 'Kod parliament',
            'parliament' => 'parliament',
        ]);

        KodParliament::create($request->all());


        return redirect()
            ->route('kod_parliament.index')
            ->with('success','Maklumat parliament telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kodparliament  $kodparliament
     * @return \Illuminate\Http\Response
     */
    public function show(KodParliament $kodParliament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kodparliament  $kodparliament
     * @return \Illuminate\Http\Response
     */
    public function edit(KodParliament $kodParliament)
    {
        //
        $kod_parliament=$kodParliament;
        return view('kod_parliament.edit', compact('kod_parliament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kodparliament  $kodparliament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodParliament $kodParliament)
    {
        //
        $request->validate([
            //warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_parliament' => 'required|min:3|unique:kod_parliament,id_parliament,'.$kodparliament->id,//senarai field
            'parliament' => 'required|min:3|unique:kod_parliament,parliament,'.$kodparliament->id,//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_parliament' => 'Kod parliament',
            'parliament' => 'parliament',
        ]);

        $kodParliament->update($request->all());


        return redirect()
            ->route('kod_parliament.index')
            ->with('success','Maklumat parliament telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kodparliament  $kodparliament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kodparliament $kodParliament)
    {
        //
        $kodParliament->delete();

        return redirect()
        ->route('kod_gelaran.index')
        ->with('success','Maklumat gelaran telah berjaya dihapuskan');
    }
}
