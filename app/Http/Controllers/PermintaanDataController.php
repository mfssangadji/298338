<?php

namespace App\Http\Controllers;

use App\PermintaanData;
use Illuminate\Http\Request;

class PermintaanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaandata = PermintaanData::all();
        return view(config('app.root').'.permintaan-data.index', compact('permintaandata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  \App\PermintaanData  $permintaandata
     * @return \Illuminate\Http\Response
     */
    public function show(PermintaanData $permintaandata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermintaanData  $permintaandata
     * @return \Illuminate\Http\Response
     */
    public function edit(PermintaanData $permintaandata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermintaanData  $permintaandata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermintaanData $permintaandata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermintaanData  $permintaandata
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermintaanData $permintaandata, $id)
    {
        PermintaanData::destroy($id);
        return redirect()->route('permintaan-data');
    }
}
