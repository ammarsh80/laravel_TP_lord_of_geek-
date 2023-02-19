<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::orderBy('id', 'asc')->get();
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeu = new Jeu();
        return view('jeux.create', ['jeu' => $jeu, 'titre' => $jeu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    if ($request->validate([
        'titre' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
        'description' => 'string|min:3'

        ])) {

        $titre = $request->input('titre');
        $description = $request->input('description');

        $jeu = new Jeu();
        // $jeu->categorie_id = $request->input('categorie_id');

        $jeu->titre = $titre;
        $jeu->description = $description;

        $jeu->save();
        return redirect()->route('jeux.show', ['jeux' => $jeu->id]);
    } else {
        return redirect()->back();
    }   
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeu = Jeu::find($id);
        $categorie= $jeu->categorie;
        // return view('jeux.show', ['toto' => $id, 'jeu' => $jeux, 'categorie'=>$categorie]);
        return view('jeux.show', compact('jeu','categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeu::find($id);
        $categorie= $jeu->categorie;
        $categories= Categorie::all();
        // return view('jeux.edit', ['toto' => $id, 'jeu' => $jeux]);
        return view('jeux.edit', compact('jeu','categorie','categories'));

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
            'titre' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'description' => "string|min:3|max:255",
            'categorie' => "string"
            ])) {

            $titre = $request->input('titre');
            $description = $request->input('description');
            $categorie = $request->input('categorie');
            $jeu = Jeu::find($id);
            $jeu->titre = $titre;
            $jeu->description = $description;
            $categorie= Categorie::find($categorie);
            $jeu->categorie()->associate($categorie);
            $jeu->save();
            return redirect()->route('jeux.show', $jeu->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jeu::destroy($id);
        return redirect()->route('jeux.index');
    }

 /**
  * créer ou récupère un tag et l'attach à un jeu
  *
  * @param Request $request
  * @param [type] $id_jeu
  * @return void
  */
    public function attach(Request $request, $id_jeu)
    {
        if ($request->validate([
            'tag' => 'required|string|max:45|min:3'
        ])) {
            $titre_tag = $request->input('tag');
            $tag = Tag::firstOrCreate([        //firstOfCreate() crée une nouveau tag sauf s'il existe déjà
                'titre' => $titre_tag
            ]);
            
            $jeu = Jeu::find($id_jeu);
            $tags = $jeu->tags;
            $bool = $tags->contains($tag->id);  // Vérifie si le tag existe déjà

            if(!$bool) {
                $jeu->tags()->attach($tag->id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
            }

            return redirect()->route('jeux.show', $jeu->id);
        } else {
            return redirect()->back();
        }
        die;
    }
/**
 * détache un tag d'un jeu
 *
 * @param [type] $id_jeu
 * @param [type] $id_tag
 * @return void
 */
    public function detach($id_jeu, $id_tag) {
        $jeu = Jeu::find($id_jeu);
        $jeu->tags()->detach($id_tag);
        return redirect()->back();
    }
}
