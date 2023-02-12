<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'asc')->get();

        return view('tags.index', ['tags' => $tags]);  
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();
        return view('tags.create', ['tag' => $tag, 'titre' => $tag]);     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        // Récupération des données envoyées dans la requête HTTP
        $tag->titre = $request->input('titre');
    
        // Enregistrement du nouveau tag en base de données
        $tag->save();
    
        // Redirection vers la vue qui affiche les détails du nouveau tag
        // return redirect()->route('tags.show', ['id' => $tag->id]);    
        return redirect()->route('tags.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::find($id);
        return view('tags.show', ['toto' => $id, 'tag' => $tags]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('tags.edit', ['toto' => $id, 'tag' => $tags]);      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->validate([
            'titre' => 'required|string|min:2|max:45'
        ])) {

            $titre = $request->input('titre');
            $tag = Tag::find($id);
            $tag->titre = $titre;
            $tag->save();
            return redirect()->route('tags.index');
        } else {
            return redirect()->back();
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index');    }
}
