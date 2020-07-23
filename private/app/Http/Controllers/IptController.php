<?php

namespace App\Http\Controllers;

use App\Ipt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class IptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipt = Ipt::all();
        return view(config('app.root').'.ipt.index', compact('ipt'));
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
        
        $ipt = new Ipt();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "ipt_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $ipt->file = $file;
        $ipt->save();
        return redirect()->route('ipt');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ipt  $ipt
     * @return \Illuminate\Http\Response
     */
    public function show(Ipt $ipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ipt  $ipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Ipt $ipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ipt  $ipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ipt $ipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ipt  $ipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ipt $ipt)
    {
        Ipt::destroy($ipt->id);
        return redirect()->route('ipt');
    }
}
