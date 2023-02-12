<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <hr><br>
    <h1>Détails da la catégorie numéro {{$categorie->id}}</h1><br>
    <hr>
    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$categorie->titre}}</h2>
<p>{{__('Liste de tous les jeux de cette catégorie')}}:</p>  
<ul class="list-disc">

    @foreach($jeux as $jeu)
    <li>
        {{$jeu->titre}}
    </li>
    
    @endforeach
</ul>

<div>

    <x-buttons.edit :action="route('categories.edit', $categorie->id)"></x-buttons.edit>
    <x-buttons.delete :action="route('categories.destroy',$categorie->id)"></x-buttons.delete>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>