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
                        <div class="flex flex-col max-w-lg">
                            <label for="description" class="py-3 font-bold">Description</label>
                            <textarea name="description" id="description">{{$jeu->description}}</textarea>
                            @error('description')
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
                            <li class="m-2 text-xl bg-orange-200 p-2 rounded-lg">
                                <!-- <a href="{{route('tags.show', $tag->id)}}">{{$tag->titre}}</a> -->
                                <a href="{{route('jeux.detach', [$jeu->id, $tag->id])}}">{{$tag->titre}}
                                    <svg fill="none" stroke="red" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="inline-block h-6 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                    </svg>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                </div>
                <div class="flex max-w-s pb-10">
                    <label for="tag" class="py-5 font-bold ml-5 mr-2 text-lg"> {{__('new Tag')}}</label>
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