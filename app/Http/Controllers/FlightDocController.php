<?php

namespace App\Http\Controllers;

use App\FlightDoc;
use Illuminate\Http\Request;

class FlightDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flightdoc = FlightDoc::all();
        return view(config('app.root').'.flightdoc.index', compact('flightdoc'));
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
        
        $flightdoc = new FlightDoc();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "flightdoc_".time().'.'.$ext;
        $request->file('file')->move('docs/', $file);
        $flightdoc->maskapai = $request->maskapai;
        $flightdoc->file = $file;
        $flightdoc->save();
        return redirect()->route('flightdoc');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightDoc  $flightdoc
     * @return \Illuminate\Http\Response
     */
    public function show(FlightDoc $flightdoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightDoc  $flightdoc
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightDoc $flightdoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightDoc  $flightdoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightDoc $flightdoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightDoc  $flightdoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightDoc $flightdoc)
    {
        FlightDoc::destroy($flightdoc->id);
        return redirect()->route('flightdoc');
    }
}
