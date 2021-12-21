<form action="{{url('/items')}}" method="post">
    @csrf
    @include('items.form');
</form>
