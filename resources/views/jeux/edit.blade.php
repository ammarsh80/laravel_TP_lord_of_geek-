<x-app-layout> 





<h1>Détails d'un jeu</h1>
<h2>Titre : {{$titi}}</h2>

<a href="{{route('jeux.edit', $titi->id)}}"> <x-edit-button>Modifier</x-primary-button>




</x-app-layout>