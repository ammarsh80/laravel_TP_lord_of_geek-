<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier le tag numéro {{$tag->id}}</h1>
                    <form action="">
                        <div>
                            <label for="titre">Titre :</label>
                        </div>
                        <input type="text" name="titre" value="{{$tag->titre}}">
                    </form>
                    <a href="{{route('tags.edit', $tag->id)}}"> <x-save-button>Sauvgarder</x-primary-button>
                            <a href=""> <x-delete-button>Annuler</x-primary-button><a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>