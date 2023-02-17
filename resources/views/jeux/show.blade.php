<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <hr><br>
    <h1>Détails du jeu numéro {{$jeu->id}}</h1><br>
    <hr>
    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$jeu->titre}}</h2>
    <p class="font-bold text-xl">Dans catégorie: 
    <!-- <a href="{{}}"><x-buttons.category :action="route('categories.show', $categorie->id)"></x-buttons.category>{{$categorie->titre}}</a> -->
    <a href="{{route('categories.show', $categorie->id)}}" class=" inline-flex items-center ml-1 mr-1 px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{$categorie->titre}}</a>
 
    </p>
    <hr>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident sint architecto iure voluptas, accusantium doloribus dolores, eos voluptate dolor culpa cupiditate porro optio ipsum mollitia recusandae quisquam magni maiores earum.</p>

    <x-buttons.edit :action="route('jeux.edit', $jeu->id)"></x-buttons.edit>
    <x-buttons.delete :action="route('jeux.destroy',$jeu->id)"></x-buttons.delete>
    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>