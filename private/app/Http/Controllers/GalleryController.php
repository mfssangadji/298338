<?php

namespace App\Http\Controllers;

use App\Album;
use App\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $album = Album::find($request->id);
        return view(config('app.root').'.gallery.index', compact('album'));
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
            'file' => 'required',
            'description' => 'required',
        ]);
        
        $gallery = new Gallery();
        $ext = $request->file('file')->getClientOriginalExtension();
        $file = "gallery_".time().'.'.$ext;
        Image::make($request->file('file'))
            ->encode('jpg', 60)
            ->orientate()
            ->save(public_path('/docs/' . $file), 60, 'jpg');
        $gallery->file = $file;
        $gallery->album_id = $request->album_id;
        $gallery->description = $request->description;
        $gallery->save();
        return redirect()->back();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gallery = Gallery::findorFail($request->gid);
        $gallery->delete();
        return redirect()->back();
    }

     public function view(Request $request){
        $file = $request->file; 
        return view('admin.gallery.view', compact('file'));
    }
}
