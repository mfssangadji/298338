<?php

namespace App\Http\Controllers;

use App\FlightDocUser;
use Illuminate\Http\Request;

class FlightDocUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fdu = FlightDocUser::all();
        return view(config('app.root').'.flightdocusers.index', compact('fdu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pass = rand(111111,999999);
        return view(config('app.root').'.flightdocusers.create', compact('pass'));
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
            'name' => 'required',
            'email' => 'required',
            'maskapai' => 'required',
            'password' => 'required',
        ]);

        FlightDocUser::create($request->all());
        return redirect()->route('flightdoc-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightDocUser  $flightDocUser
     * @return \Illuminate\Http\Response
     */
    public function show(FlightDocUser $flightDocUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightDocUser  $flightDocUser
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightDocUser $flightDocUser, $id)
    {
        $fdu = FlightDocUser::find($id);
        return view(config('app.root').'.flightdocusers.edit', compact('fdu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightDocUser  $flightDocUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightDocUser $flightDocUser, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'maskapai' => 'required',
            'password' => 'required',
        ]);

        FlightDocUser::where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'maskapai' => $request->maskapai,
            'password' => $request->password,
        ]);
        return redirect()->route('flightdoc-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightDocUser  $flightDocUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightDocUser $flightDocUser, $id)
    {
        FlightDocUser::destroy($id);
        return redirect()->back();
    }
}
