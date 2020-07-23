<?php

namespace App\Http\Controllers;

use App\Pahb;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PahbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pahb = Pahb::all();
        return view(config('app.root').'.pahb.index', compact('pahb'));
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
        
        $pahb = new Pahb();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "pahb_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $pahb->file = $file;
        $pahb->save();
        return redirect()->route('pahb');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pahb  $pahb
     * @return \Illuminate\Http\Response
     */
    public function show(Pahb $pahb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pahb  $pahb
     * @return \Illuminate\Http\Response
     */
    public function edit(Pahb $pahb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pahb  $pahb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pahb $pahb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pahb  $pahb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pahb $pahb)
    {
        Pahb::destroy($pahb->id);
        return redirect()->route('pahb');
    }
}
