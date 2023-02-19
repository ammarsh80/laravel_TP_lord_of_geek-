<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier le tag numéro {{$tag->id}}</h1>
                    <form action="{{route('tags.update',$tag->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="titre" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="titre" value="{{$tag->titre}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('tags.update', $tag->id)"></x-buttons.save>
                    </form>
                    <x-buttons.cancel :action="route('tags.index',$tag->id)"></x-buttons.cancel>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>