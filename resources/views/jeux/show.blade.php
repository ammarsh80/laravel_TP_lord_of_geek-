<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails du jeu numéro {{$jeu->id}}</h1><br>
                    <hr>
                    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$jeu->titre}}</h2>
                    <p class="font-bold text-xl">Dans catégorie:</p>
                        <!-- <a href="{{}}"><x-buttons.category :action="route('categories.show', $categorie->id)"></x-buttons.category>{{$categorie->titre}}</a> -->
                    <ul class="flex">
                        <a href="{{route('categories.show', $categorie->id)}}" class="m-2 text-xl bg-green-400 max-w-min p-2 rounded-lg">
                            {{$categorie->titre}}</a>
                        <ul class="flex">
                            @foreach($jeu->tags as $tag)
                            <li class="m-2 text-xl bg-orange-200 max-w-min p-2 rounded-lg"><a href="{{route('tags.show', $tag->id)}}">{{$tag->titre}}</a></li>
                            @endforeach
                        </ul>
                    </ul>
                    
                    <hr>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident sint architecto iure voluptas, accusantium doloribus dolores, eos voluptate dolor culpa cupiditate porro optio ipsum mollitia recusandae quisquam magni maiores earum.</p>

                    <x-buttons.edit :action="route('jeux.edit', $jeu->id)"></x-buttons.edit>
                    <x-buttons.delete :action="route('jeux.destroy',$jeu->id)"></x-buttons.delete>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>