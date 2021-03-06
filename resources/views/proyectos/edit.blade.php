@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de proyectos</h1>
@stop

@section('content')
<form action="{{ url('/proyectos/'.$proyectos->id) }}" method="post">       
    @csrf
    {{method_field('PATCH')}} 
    @include('proyectos.form');
    </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

