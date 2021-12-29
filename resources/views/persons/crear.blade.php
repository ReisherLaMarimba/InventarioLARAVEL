
@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Crear empleado</h1>
@stop

@section('content')

<div class="container">
<form action="{{url('/persons')}}" method="post">
    @csrf
    @include('persons.form');
</form>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  
@stop