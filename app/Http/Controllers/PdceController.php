<?php

namespace App\Http\Controllers;

use App\Pdce;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;

class PdceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Pdce::all();
        return view(config('app.root').'.pdce.index', compact('contents'));
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

        Pdce::create([
            'content' => $request->content,
        ]);

        return redirect()->route('pdce');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdce  $pdce
     * @return \Illuminate\Http\Response
     */
    public function show(Pdce $pdce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pdce  $pdce
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdce $pdce)
    {
        $content = Pdce::find($pdce->id);
        $contents = Pdce::all();
        return view(config('app.root').'.pdce.index', compact('content','contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pdce  $pdce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pdce::where('id', $id)
        ->update([
            'content' => $request->content,
        ]);

        return redirect()->route('pdce');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdce  $pdce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdce = Pdce::destroy($id);
        return redirect()->route('pdce');
    }
}
