<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('tags.store')}}" method="POST">
                        @csrf
                        <label for="titre" class="block text-sm font-bold text-gray-700">
                            {{__('Ajouter un nouveau tag')}}
                        </label>
                        <input type="text" name="titre" required>
                        @error('titre')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('tags.store')"></x-buttons.save>
                    </form>
                    <x-buttons.cancel :action="route('tags.index')"></x-buttons.cancel>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>