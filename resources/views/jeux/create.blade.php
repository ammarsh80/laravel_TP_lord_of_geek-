<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('jeux.store')}}" method="POST">
                        @csrf
                        <div>
                            <label for="titre" class="block text-sm font-bold text-gray-700">
                                {{__('Ajouter le nom du nouveau jeu')}}
                            </label>
                        </div>
                        <input type="text" name="titre" required>
                        <button type="submit" class=" p-3 bg-green-500 text-white hover:bg-red-400">
                            {{__('Enregistrer')}}
                        </button>
                    </form>

                    <a href=""> <x-delete-button>Annuler</x-primary-button><a>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>