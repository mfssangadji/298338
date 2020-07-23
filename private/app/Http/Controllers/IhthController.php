<?php

namespace App\Http\Controllers;

use App\Ihth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class IhthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ihth = Ihth::all();
        return view(config('app.root').'.ihth.index', compact('ihth'));
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
        
        $ihth = new Ihth();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "ihth_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $ihth->file = $file;
        $ihth->save();
        return redirect()->route('ihth');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ihth  $ihth
     * @return \Illuminate\Http\Response
     */
    public function show(Ihth $ihth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ihth  $ihth
     * @return \Illuminate\Http\Response
     */
    public function edit(Ihth $ihth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ihth  $ihth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ihth $ihth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ihth  $ihth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ihth $ihth)
    {
        Ihth::destroy($ihth->id);
        return redirect()->route('ihth');
    }
}
