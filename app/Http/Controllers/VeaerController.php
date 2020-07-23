<?php

namespace App\Http\Controllers;

use App\Veaer;
use Illuminate\Http\Request;

class VeaerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veaer = Veaer::all();
        return view(config('app.root').'.veaer.index', compact('veaer'));
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
        
        $veaer = new Veaer();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "var_".time().'.'.$ext;
        $request->file('file')->move('docs/', $file);
        $veaer->file = $file;
        $veaer->save();
        return redirect()->route('veaer');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Veaer  $veaer
     * @return \Illuminate\Http\Response
     */
    public function show(Veaer $veaer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veaer  $veaer
     * @return \Illuminate\Http\Response
     */
    public function edit(Veaer $veaer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veaer  $veaer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veaer $veaer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Veaer  $veaer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veaer $veaer)
    {
        Veaer::destroy($veaer->id);
        return redirect()->route('veaer');
    }
}
