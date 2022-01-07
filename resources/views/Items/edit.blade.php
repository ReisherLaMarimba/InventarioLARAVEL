@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editando:<span style="color: red">{{$items->nombre}}</span></h1>
@stop

@section('content')
    <form action="{{ url('/items' . $items->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('items.form');
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
