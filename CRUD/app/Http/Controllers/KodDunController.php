<?php

namespace App\Http\Controllers;

use App\Models\KodDun;
use Illuminate\Http\Request;

class KodDunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kod_dunArray = KodDun::paginate(20);
        return view('kod_dun.index',compact('kod_dunArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kod_dun.create');
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
            'id_dun' => 'required|min:3|unique:kod_dun',//senarai field
            'dun' => 'required|min:3|unique:kod_dun',//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_dun' => 'Kod Dun',
            'dun' => 'Dun',
        ]);

        KodDun::create($request->all());


        return redirect()
            ->route('kod_dun.index')
            ->with('success','Maklumat dun telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodDun  $kodDun
     * @return \Illuminate\Http\Response
     */
    public function show(KodDun $kodDun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodDun  $kodDun
     * @return \Illuminate\Http\Response
     */
    public function edit(KodDun $kodDun)
    {
        //
        $kod_dun=$kodDun;
        return view('kod_dun.edit', compact('kod_dun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodDun  $kodDun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodDun $kodDun)
    {
        //
        $request->validate([
            //warning mesej kalau user tak input dgn betul
            //unique:jawatanutk semak file nama tu ada tak dalam table jabatan
            'id_dun' => 'required|min:3|unique:kod_dun,id_dun,'.$kodDun->id,//senarai field
            'dun' => 'required|min:3|unique:kod_dun,dun,'.$kodDun->id,//senarai field
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[

            'id_dun' => 'Kod Dun',
            'dun' => 'Dun',
        ]);

        $kodDun->update($request->all());


        return redirect()
            ->route('kod_dun.index')
            ->with('success','Maklumat dun telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodDun  $kodDun
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodDun $kodDun)
    {
        //
        $kodDun->delete();

        return redirect()
        ->route('kod_dun.index')
        ->with('success','Maklumat dun telah berjaya dihapuskan');
    }
}
