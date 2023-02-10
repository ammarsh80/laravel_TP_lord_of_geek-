<x-app-layout>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('titre', 'Toutes les categories')

                    <table>
                        <caption>
                            <h1 style="font-weight: bold;">{{__('list of all categories')}}</h1>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITRE</th>
                                <th colspan="2">ACTION</th>
                                <th><a href="{{route('categories.create')}}"> <x-create-button>CREATE</x-primary-button><a></th>
                            </tr>
                        </thead>
                        @foreach($categories as $categorie)
                        <tr>
                            <td>
                                <p>{{$categorie->id}}</p>
                            </td>
                            <td><a href="{{route('categories.show', $categorie->id)}}">{{$categorie-> titre}}</a>
                            </td>
                            <td><a href="{{route('categories.edit', $categorie->id)}}"> <x-edit-button>Modifier</x-primary-button></a></td>
                            <td><a href="{{route('categories.show', $categorie->id)}}"> <x-show-button>Voir</x-primary-button></a></td>
                            <td><a href=""> <x-delete-button>Supprimer</x-primary-button></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>