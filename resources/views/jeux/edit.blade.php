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


                            <x-buttons.cancel :action="route('jeux.index',$jeu->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                        {{ __('list of tags of this game') }}
                    </h2>

                    <form action="{{route('jeux.attach', $jeu->id)}}" method="POST">
                        <!-- @method('PUT') -->
                        @csrf

                    <ul class="flex">
                        @foreach($jeu->tags as $tag)
                        <li class="m-2 text-xl bg-orange-200 max-w-min p-2 rounded-lg"><a href="{{route('tags.show', $tag->id)}}">{{$tag->titre}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex max-w-s pb-10">
                    <label for="tag" class="py-5 font-bold ml-5 mr-2 text-lg"> {{__('new Tag')}}</label>
                    <!-- <form action="{{route('tags.store')}}" method="POST"> -->
                         <!-- @csrf -->

                        <input type="text" name="tag" id="tag" placeholder="tag">

                        @error('tag')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror

                        <x-buttons.add :action="route('tags.store')"></x-buttons.add>
                    </form>
                </div>
            </div>
        </div>

</x-app-layout>