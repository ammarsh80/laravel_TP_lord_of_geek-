<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
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

    if ($request->validate([
        'titre' => "required|string|min:3|max:45|regex:/^[a-zA-Z0-9]+(['\s][a-zA-Z0-9]+)*$/"
    ])) {

        $titre = $request->input('titre');
        $jeu = new Jeu();
        $jeu->categorie_id = $request->input('categorie_id');

        $jeu->titre = $titre;
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
            'titre' => "required|string|min:3|max:45|regex:/^[a-zA-Z0-9]+(['\s][a-zA-Z0-9]+)*$/",
            // 'description' => "required|string|min:3",
            'categorie' => "required",
            ])) {

            $titre = $request->input('titre');
            // $description = $request->input('description');
            $categorie = $request->input('categorie');
            $jeu = Jeu::find($id);
            $jeu->titre = $titre;
            // $jeu->description = $description;
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
}
