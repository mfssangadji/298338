<?php

namespace App\Http\Controllers;

use App\Buletin;
use Illuminate\Http\Request;

class BuletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buletin = Buletin::all();
        return view(config('app.root').'.buletin.index', compact('buletin'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);
        
        $buletin = new Buletin();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "buletin_".time().'.'.$ext;
        $request->file('file')->move('docs/', $file);
        $buletin->file = $file;
        $buletin->save();
        return redirect()->route('buletin');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function show(Buletin $buletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function edit(Buletin $buletin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buletin $buletin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buletin $buletin)
    {
        Buletin::destroy($buletin->id);
        return redirect()->route('buletin');
    }
}
