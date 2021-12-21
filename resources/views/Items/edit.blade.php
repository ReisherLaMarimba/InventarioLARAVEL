@include('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/items/'.$items->id) }}" method="post">       
@csrf
{{method_field('PATCH')}} 
@include('items.form');
</form>
</div>