@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Retirar equipos</h1>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/path/to/select2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('content')

    <div class="card">
        <div class="card-body">


            <h2>Selecciona los equipos que desea retirar</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <select name="" class="form-control">
                            <option value="">Seleccione los equipos</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="" class="form-control">
                            <option value="">Seleccione el encargado</option>
                            @foreach ($persona as $personas)
                                <option value="{{ $personas->id }}">{{ $personas->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="" class="form-control">
                            <option value="">Seleccione el proyecto</option>
                            @foreach ($proyecto as $proyectos)
                                <option value="{{ $proyectos->id }}">{{ $proyectos->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block">Agregar</button>

                    </div>

                </div>

            </div>



        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <h3>Listado en proceso de retiro</h3>
        </div>
    </div>

@stop



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".form-control").select2({
            theme: "bootstrap4"

        });
    </script>
@stop
