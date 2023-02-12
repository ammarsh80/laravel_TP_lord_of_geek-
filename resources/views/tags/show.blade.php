<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <hr><br>
    <h1>Détails du tag numéro {{$tag->id}}</h1><br>
    <hr>
    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$tag->titre}}</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident sint architecto iure voluptas, accusantium doloribus dolores, eos voluptate dolor culpa cupiditate porro optio ipsum mollitia recusandae quisquam magni maiores earum.</p>
    <x-buttons.edit :action="route('tags.edit', $tag->id)"></x-buttons.edit>
    <x-buttons.delete :action="route('tags.destroy',$tag->id)"></x-buttons.delete>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>