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
