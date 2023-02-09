@extends('layouts.template')

@section('titre', 'jeux')

@section('contenu')


<h1>{{__('list of games')}}</h1>
<ul>
    @foreach($jeux as $jeu)
    <li>
        <a href="{{route('jeux.show', $jeu->id)}}">
            {{$jeu-> titre}}
        </a>
    </li>
    @endforeach
</ul>



@endsection
