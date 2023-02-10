<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('titre', 'Tous les tags')

                    <table>
                        <caption>
                            <h1 style="font-weight: bold;">{{__('list of all tags')}}</h1>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITRE</th>
                                <th colspan="2">ACTION</th>
                                <th><a href="{{route('tags.create')}}"> <x-create-button>CREATE</x-primary-button><a></th>
                            </tr>
                        </thead>
                        @foreach($tags as $tag)
                        <tr>
                            <td>
                                <p>{{$tag->id}}</p>
                            </td>
                            <td><a href="{{route('tags.show', $tag->id)}}">{{$tag-> titre}}</a>
                            </td>
                            <td><a href="{{route('tags.edit', $tag->id)}}"> <x-edit-button>Modifier</x-primary-button></a></td>
                            <td><a href="{{route('tags.show', $tag->id)}}"> <x-show-button>Voir</x-primary-button></a></td>
                            <td>  <x-buttons.delete :action="route('tags.destroy',$tag->id)">Suprimer</x-buttons.delete><a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>