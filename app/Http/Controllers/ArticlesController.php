<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view(config('app.root').'.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.root').'.articles.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $description = $request->input('description');
        $article = new Article;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $id=1;
        foreach($images as $img){
            $src = $img->getAttribute('src');            
            if(preg_match('/data:image/', $src)){                
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];                
                $filename = uniqid();
                $filepath = "docs/$filename.$mimetype";    
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  ->resize(null, 700, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->save($filepath);                
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('id', "img".$id);
            }
            $id++;
        } 

        $article->title = $request->title;
        $article->description = $dom->saveHTML();
        $article->save();

        return redirect()->route('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        return view(config('app.root').'.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $description = $request->input('description');
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $id=1;
        foreach($images as $img){
            $src = $img->getAttribute('src');            
            if(preg_match('/data:image/', $src)){                
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];                
                $filename = uniqid();
                $filepath = "docs/$filename.$mimetype";    
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  ->resize(null, 700, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->orientate()
                  ->save($filepath);                
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('id', "img".$id);
            }
            $id++;
        } 

        $article = Article::find($article->id);
        $article->title = $request->title;
        $article->description = $dom->saveHTML();
        $article->save();

        return redirect()->route('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect()->route('articles');
    }
}
