<div class="card">
    <div class="card-body">
        <div class="col-md-3">

            <div class="row">

           
            <Label for="Nombre"> Nombre del proyecto</Label>
            <input type="text" name="nombre" value="{{ isset($proyectos->nombre) ? $proyectos->nombre : '' }}" id="nombre">
            <div class="row">
                <div class="col-md-3">

             
            <Label for="Nombre">Ubicacion </Label>
            <input type="text" name="ubicacion" value="{{ isset($proyectos->ubicacion) ? $proyectos->ubicacion : '' }}"
                id="ubicacion">
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<input type="submit" value="Guardar Datos">

<a href="{{ url('proyectos') }}" class="btn btn-warning" role="button">Regresar</a>
