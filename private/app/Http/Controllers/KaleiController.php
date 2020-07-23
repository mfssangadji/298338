<?php

namespace App\Http\Controllers;

use App\Kalei;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class KaleiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kalei = Kalei::all();
        return view(config('app.root').'.kalei.index', compact('kalei'));
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
        
        $kalei = new Kalei();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "kalei_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $kalei->file = $file;
        $kalei->save();
        return redirect()->route('kalei');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kalei  $kalei
     * @return \Illuminate\Http\Response
     */
    public function show(Kalei $kalei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kalei  $kalei
     * @return \Illuminate\Http\Response
     */
    public function edit(Kalei $kalei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kalei  $kalei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kalei $kalei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kalei  $kalei
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kalei $kalei)
    {
        Kalei::destroy($kalei->id);
        return redirect()->route('kalei');
    }
}
