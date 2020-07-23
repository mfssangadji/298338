<?php

namespace App\Http\Controllers;

use App\Awsw;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;

class AwswController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Awsw::all();
        return view(config('app.root').'.awsw.index', compact('contents'));
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

        Awsw::create([
            'content' => $request->content,
        ]);

        return redirect()->route('aerodrom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Awsw  $awsw
     * @return \Illuminate\Http\Response
     */
    public function show(Awsw $awsw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Awsw  $awsw
     * @return \Illuminate\Http\Response
     */
    public function edit(Awsw $awsw, $id)
    {
        $content = Awsw::find($id);
        $contents = Awsw::all();
        return view(config('app.root').'.awsw.index', compact('content','contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Awsw  $awsw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Awsw::where('id', $id)
        ->update([
            'content' => $request->content,
        ]);

        return redirect()->route('aerodrom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Awsw  $awsw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $awsw = Awsw::destroy($id);
        return redirect()->route('aerodrom');
    }
}
