<?php

namespace App\Http\Controllers;

use App\Pdgt;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;

class PdgtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Pdgt::all();
        return view(config('app.root').'.pdgt.index', compact('contents'));
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
            'content' => 'required',
        ]);  

        Pdgt::create([
            'content' => $request->content,
        ]);

        return redirect()->route('pdgt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdgt  $pdgt
     * @return \Illuminate\Http\Response
     */
    public function show(Pdgt $pdgt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pdgt  $pdgt
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdgt $pdgt)
    {
        $content = Pdgt::find($pdgt->id);
        $contents = Pdgt::all();
        return view(config('app.root').'.pdgt.index', compact('content','contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pdgt  $pdgt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pdgt::where('id', $id)
        ->update([
            'content' => $request->content,
        ]);

        return redirect()->route('pdgt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdgt  $pdgt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdgt = Pdgt::destroy($id);
        return redirect()->route('pdgt');
    }
}
