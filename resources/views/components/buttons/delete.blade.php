@if(isset($action))
<form action="{{$action}}" method="POST" class="inline">
    @method('DELETE') @csrf
    <input type="submit" value="{{__('Suprimer')}}" class=" inline-flex items-center mt-2 ml-1 mr-1 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
</form>
@endif