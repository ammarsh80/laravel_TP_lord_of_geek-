<x-app-layout> 




<hr><br>
<h1>Détails du jeu numéro {{$titi->id}}</h1><br>
<hr>
<h2>Titre : {{$titi->titre}}</h2>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident sint architecto iure voluptas, accusantium doloribus dolores, eos voluptate dolor culpa cupiditate porro optio ipsum mollitia recusandae quisquam magni maiores earum.</p>
<a href="{{route('jeux.edit', $titi->id)}}"> <x-edit-button>Modifier</x-primary-button><a>

<a href="{{route('jeux.show', $titi->id)}}"> <x-delete-button>Supprimer</x-primary-button>
                                </a> 


</x-app-layout>
