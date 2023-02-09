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
                    @section('titre', 'Tous les jeux')

                    <table>
                        <caption>
                            <h1>{{__('list of games')}}</h1>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITRE</th>
                                <th>ACTION</th>
                                <th>
                                <a href="{{route('jeux.create')}}"> <x-create-button>CREATE</x-primary-button><a>


                                </th>
                            </tr>
                        </thead>
                        @foreach($jeux as $jeu)
                        <tr>
                            <td>
                                <p>{{$jeu->id}}</p>
                            </td>
                            <td>
                                <a href="{{route('jeux.show', $jeu->id)}}">
                                    {{$jeu-> titre}}
                                </a>
                            </td>
                            <td>
                                <a href="{{route('jeux.edit', $jeu->id)}}"> <x-edit-button>Modifier</x-primary-button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('jeux.show', $jeu->id)}}"> <x-show-button>Voir</x-primary-button>
                                </a>
                            </td>
                            <td>
                            <a href="{{route('jeux.show', $jeu->id)}}"> <x-delete-button>Supprimer</x-primary-button>
                                </a>                            </td>
                        </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>