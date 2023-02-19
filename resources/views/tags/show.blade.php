<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails du tag n° {{$tag->id}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-2xl">Titre : {{$tag->titre}}</h2>
                    <h1 class="text-xl p-2 text-gray-400">Liste des jeux avec ce tags</h1>
                    <ul class="p-1 mb-5">
                        @foreach($jeux as $jeu)
                        <li><a href="{{route('jeux.show', $jeu->id)}}">{{$jeu->titre}}</a></li>
                        @endforeach
                    </ul>
                    <x-buttons.edit :action="route('tags.edit', $tag->id)"></x-buttons.edit>
                    <x-buttons.delete :action="route('tags.destroy',$tag->id)"></x-buttons.delete>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>