<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('jeux.store')}}" method="POST">
                        @csrf

                        <label for="titre" class="block text-sm font-bold text-gray-700">
                            {{__('Ajouter le nom du nouveau jeu')}}
                        </label>

                        <input type="text" name="titre" required>
                        <div>
                            <label for="categorie">
                                {{__('Dans catégorie')}}
                            </label>
                        </div>
                        <input type="text" name="categorie_id" required>
                        <div>
                            <x-buttons.save :action="route('jeux.store')"></x-buttons.save>
                    </form>
                    <x-buttons.cancel :action="route('jeux.index')"></x-buttons.cancel>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>