<Label for="Nombre"> Nombre del proyecto</Label>
    <input type="text" name = "nombre" value="{{isset($proyectos->nombre)?$proyectos->nombre:''}}" id="nombre">
    <br>
    <Label for="Nombre"> Nombre</Label>
    <input type="text" name = "ubicacion" value="{{isset($proyectos->ubicacion)?$proyectos->ubicacion:''}}"id = "ubicacion">
    <br>
    <input type="submit" value="Guardar Datos">

    <a href="{{url('proyectos')}}"class="btn btn-warning" role="button">Regresar</a>