
@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Crear Equipo</h1>
@stop

@section('content')

<div class="container">
<form action="{{url('/items')}}" method="post">
    @csrf
    @include('items.form');
</form>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  
@stop