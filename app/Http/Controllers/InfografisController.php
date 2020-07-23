<?php

namespace App\Http\Controllers;

use App\Infografis;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infografis = Infografis::all();
        return view(config('app.root').'.infografis.index', compact('infografis'));
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
        
        $infografis = new Infografis();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "infografis_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $infografis->file = $file;
        $infografis->save();
        return redirect()->route('infografis');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function show(Infografis $infografis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function edit(Infografis $infografis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infografis $infografis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infografis $infografis, $id)
    {
        Infografis::destroy($id);
        return redirect()->route('infografis');
    }
}
