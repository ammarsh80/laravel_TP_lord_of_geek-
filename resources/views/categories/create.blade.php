<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form>
                        <label for="titre">Ajouter le nom de la nouvelle catégorie</label>
                        <input type="text" name="titre" required>
                        <a href="{{route('categories.store', $categorie)}}"> <x-save-button>Sauvgarder</x-primary-button><a>
                                    <a href=""> <x-delete-button>Annuler</x-primary-button><a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>