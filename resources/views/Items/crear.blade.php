@include('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/items')}}" method="post">
    @csrf
    @include('items.form');
</form>

</div>