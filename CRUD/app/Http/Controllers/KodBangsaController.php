<?php

namespace App\Http\Controllers;

use App\Models\KodBangsa;
use Illuminate\Http\Request;

class KodBangsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kod_bangsaArray = KodBangsa::paginate(20);
        return view('kod_bangsa.index',compact('kod_bangsaArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kod_bangsa.create');
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
            'id_bangsa' => 'required|min:3|unique:kod_bangsa',//senarai field
            'bangsa' => 'required|min:3|unique:kod_bangsa',//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_bangsa' => 'Kod bangsa',
            'bangsa' => 'Bangsa',
        ]);

        KodBangsa::create($request->all());


        return redirect()
            ->route('kod_bangsa.index')
            ->with('success','Maklumat dun telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodBangsa  $kodBangsa
     * @return \Illuminate\Http\Response
     */
    public function show(KodBangsa $kodBangsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodBangsa  $kodBangsa
     * @return \Illuminate\Http\Response
     */
    public function edit(KodBangsa $kodBangsa)
    {
        //
        $kod_bangsa=$kodBangsa;
        return view('kod_bangsa.edit', compact('kod_bangsa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodBangsa  $kodBangsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodBangsa $kodBangsa)
    {
        //
        $request->validate([
            //warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_bangsa' => 'required|min:3|unique:kod_bangsa,id_bangsa,'.$kodBangsa->id,//senarai field
            'bangsa' => 'required|min:3|unique:kod_bangsa,bangsa,'.$kodBangsa->id,//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_bangsa' => 'Kod Bangsa',
            'bangsa' => 'Bangsa',
        ]);

        $kodBangsa->update($request->all());


        return redirect()
            ->route('kod_bangsa.index')
            ->with('success','Maklumat bangsa telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodBangsa  $kodBangsa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodBangsa $kodBangsa)
    {
        //
        $kodBangsa->delete();

        return redirect()
        ->route('kod_bangsa.index')
        ->with('success','Maklumat bangsa telah berjaya dihapuskan');
    }
}
