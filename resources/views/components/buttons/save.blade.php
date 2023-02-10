@if(isset($action))
<form action="{{$action}}" method="POST" class="inline">
    @method('DELETE') @csrf
    <input type="submit" value="{{__('Suprimer')}}" class=" p-3 bg-red-500 text-white hover:bg-red-400">
</form>
@endif