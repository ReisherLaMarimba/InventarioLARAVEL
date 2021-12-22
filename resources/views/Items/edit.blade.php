@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Equipos</h1>
@stop

@section('content')
<form action="{{ url('/items/'.$items->id) }}" method="post">       
    @csrf
    {{method_field('PATCH')}} 
    @include('items.form');
    </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

