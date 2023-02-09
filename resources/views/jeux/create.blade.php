<x-app-layout>
    <form>
        <label for="titre">Ajouter le nom du nouveau jeu</label>
        <input type="text" name="titre" required>

        <a href="{{route('jeux.store', $jeu)}}"> <x-save-button>Sauvgarder</x-primary-button><a>
                    <a href=""> <x-save-button>Annuler</x-primary-button><a>
    </form>
</x-app-layout>