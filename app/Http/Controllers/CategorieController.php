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
        $categorie = new Categorie();
        // Récupération des données envoyées dans la requête HTTP
        $categorie->titre = $request->input('titre');
    
        // Enregistrement du nouveau categorie en base de données
        $categorie->save();
    
        // Redirection vers la vue qui affiche les détails du nouveau categorie
        return redirect()->route('categories.show', ['id' => $categorie->id]);    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categorie::find($id);
        // $jeux = $categories->jeux;
        return view('categories.show', ['toto' => $id, 'categorie' => $categories]);    }
        // return view('categories.show', compact('categories','jeux'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::find($id);
        return view('categories.edit', ['toto' => $id, 'categorie' => $categories]);      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
