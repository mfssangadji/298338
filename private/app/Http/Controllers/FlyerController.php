<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FlyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flyer = Flyer::all();
        return view(config('app.root').'.flyer.index', compact('flyer'));
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
        
        $flyer = new Flyer();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "flyer_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $flyer->file = $file;
        $flyer->save();
        return redirect()->route('flyer');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function show(Flyer $flyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Flyer $flyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flyer $flyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flyer $flyer)
    {
        Flyer::destroy($flyer->id);
        return redirect()->route('flyer');
    }
}
