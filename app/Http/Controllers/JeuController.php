<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
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
        $jeu = new Jeu();
        // Récupération des données envoyées dans la requête HTTP
        $jeu->titre = $request->input('titre');
        $jeu->categorie_id = $request->input('categorie_id');

        // Enregistrement du nouveau jeu en base de données
        $jeu->save();

        // Redirection vers la vue qui affiche les détails du nouveau jeu
        // return redirect()->route('jeux.show', ['id' => $jeu->id]);
        return redirect()->route('jeux.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeux = Jeu::find($id);
        $categorie= $jeux->categorie;
        // return view('jeux.show', ['toto' => $id, 'jeu' => $jeux, 'categorie'=>$categorie]);
        return view('jeux.show', compact('jeux','categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeux = Jeu::find($id);
        return view('jeux.edit', ['toto' => $id, 'jeu' => $jeux]);
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
            $jeu = Jeu::find($id);
            $jeu->titre = $titre;
            $jeu->save();
            return redirect()->route('jeux.index');
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
}
