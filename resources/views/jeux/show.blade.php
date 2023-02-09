<!-- id={{$id}} jeux={{$jeux->titre}} -->

@extends('layouts.template')
@section('titre', 'Un seul jeu')
@section('contenu')
<h1>Détails d'un jeu</h1>
<h2>Titre : {{$jeu->titre}}</h2>
<div class="overflow-hidden
shadow-sm
rounded-lg
bg-indigo-500
hover:bg-cyan-600/50">
<div class="p-5
text-white
text-center
md:text-left">
Titre : {{$jeu->titre}}
</div>
</div>

@endsection