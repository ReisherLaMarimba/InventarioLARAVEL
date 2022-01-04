@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Crear Equipo</h1>
@stop

@section('content')

    <div class="container">
        <form action="{{ url('/items') }}" method="post" class="form-crear">
            @csrf
            @include('items.form')
        </form>

    </div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    @if (session('mensaje') == 'creado'){
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Equipo de ISSRD agregado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    }


@stop
