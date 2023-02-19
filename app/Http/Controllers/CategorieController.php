<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('id', 'asc')->get();

        return view('categories.index', ['categories' => $categories]);   
        
       
     
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = new Categorie();
        return view('categories.create', ['categorie' => $categorie, 'titre' => $categorie]);        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $categorie = new Categorie();
        // // Récupération des données envoyées dans la requête HTTP
        // $categorie->titre = $request->input('titre');
    
        // // Enregistrement du nouveau categorie en base de données
        // $categorie->save();
    
        // // Redirection vers la vue qui affiche les détails du nouveau categorie
        // return redirect()->route('categories.show', ['category' => $categorie->id]);


        if ($request->validate([
            'titre' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
            ])) {
    
            $titre = $request->input('titre');
            $categorie = new Categorie();
    
            $categorie->titre = $titre;
            $categorie->save();
            return redirect()->route('categories.show', ['category' => $categorie->id]);
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
        $categorie = Categorie::find($id);
        $jeux = $categorie->jeux;
               // return view('categories.show', ['toto' => $id, 'categorie' => $categories]);   
        return view('categories.show', compact('categorie', 'jeux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        // return view('categories.edit', ['toto' => $id, 'categorie' => $categories]);    
        return view('categories.edit', compact('categorie'));
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
            'titre' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
            ])) {

            $titre = $request->input('titre');
            $categorie = Categorie::find($id);
            $categorie->titre = $titre;
            $categorie->save();
            return redirect()->route('categories.show', $categorie->id);
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
        Categorie::destroy($id);
        return redirect()->route('categories.index');    }
}
