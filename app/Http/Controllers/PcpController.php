<?php

namespace App\Http\Controllers;

use App\Pcp;
use Illuminate\Http\Request;

class PcpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcp = Pcp::all();
        return view(config('app.root').'.pcp.index', compact('pcp'));
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
        
        $pcp = new Pcp();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "pcp_".time().'.'.$ext;
        $request->file('file')->move('docs/', $file);
        $pcp->file = $file;
        $pcp->save();
        return redirect()->route('pcp');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcp  $pcp
     * @return \Illuminate\Http\Response
     */
    public function show(Pcp $pcp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcp  $pcp
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcp $pcp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcp  $pcp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcp $pcp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcp  $pcp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcp $pcp)
    {
        Pcp::destroy($pcp->id);
        return redirect()->route('pcp');
    }
}
