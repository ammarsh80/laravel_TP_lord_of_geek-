<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
     
                    <h1>Modifier le jeu numéro {{$jeu->id}}</h1>
                    
                    <form action="{{route('jeux.update',$jeu->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div class="flex flex-col max-w-lg">
                            <label for="titre" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="titre" value="{{$jeu->titre}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <br>
                        </div>

                        <div class="flex flex-col max-w-xs">
                        <label for="categorie" class="py-3 font-bold">Catégorie </label>
                        <select name="categorie" id="categorie">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                            @endforeach
                        </select>
                        @error('categorie')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        </div>

                        
                        <div>

                            <x-buttons.save :action="route('jeux.update', $jeu->id)"></x-buttons.save>
                            <!-- <a href="#" class="btn-show" onclick="document.getElementById('titre').value='{{$jeu->titre}}'; document.getElementById('description').value='{{$jeu->description}}';">Annuler</a> -->

                        </form>
                    <x-buttons.cancel :action="route('jeux.index',$jeu->id)"></x-buttons.cancel>

                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>