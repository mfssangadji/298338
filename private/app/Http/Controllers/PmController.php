<?php

namespace App\Http\Controllers;

use App\Pm;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pm = Pm::all();
        return view(config('app.root').'.pm.index', compact('pm'));
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
        
        $pm = new Pm();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "pm_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $pm->file = $file;
        $pm->save();
        return redirect()->route('pm');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pm  $pm
     * @return \Illuminate\Http\Response
     */
    public function show(Pm $pm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pm  $pm
     * @return \Illuminate\Http\Response
     */
    public function edit(Pm $pm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pm  $pm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pm $pm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pm  $pm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pm $pm)
    {
        Pm::destroy($pm->id);
        return redirect()->route('pm');
    }
}
