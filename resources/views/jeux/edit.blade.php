<x-app-layout>





    <h1>Modifier le jeu numéro {{$jeu->id}}</h1>
    <form action="">
        <div>
            <label for="titre">Titre :</label>
        </div>
        <input type="text" name="titre" value="{{$jeu->titre}}">

    </form>

    <a href="{{route('jeux.edit', $jeu->id)}}"> <x-edit-button>Modifier</x-primary-button>
    <a href=""> <x-save-button>Annuler</x-primary-button><a>




</x-app-layout>