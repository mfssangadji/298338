<?php

namespace App\Http\Controllers;

use App\Pcwp;
use Illuminate\Http\Request;

class PcwpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcwp = Pcwp::all();
        return view(config('app.root').'.pcwp.index', compact('pcwp'));
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
        
        $pcwp = new Pcwp();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "pcwp_".time().'.'.$ext;
        $request->file('file')->move('docs/', $file);
        $pcwp->file = $file;
        $pcwp->save();
        return redirect()->route('pcwp');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcwp  $pcwp
     * @return \Illuminate\Http\Response
     */
    public function show(Pcwp $pcwp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcwp  $pcwp
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcwp $pcwp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcwp  $pcwp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcwp $pcwp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcwp  $pcwp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcwp $pcwp)
    {
        Pcwp::destroy($pcwp->id);
        return redirect()->route('pcwp');
    }
}
