

<Label for="Nombre"> Codigo del empleado</Label>
    <input type="text" name = "codigo_empleado" value="{{isset($persons->codigo_empleado)?$persons->codigo_empleado:''}}" id="codigo_empleado">
    <br>
    <Label for="Nombre"> Nombre</Label>
    <input type="text" name = "nombre" value="{{isset($persons->nombre)?$persons->nombre:''}}"id = "nombre">
    <br>
    <Label for="Nombre"> Apellido</Label>
    <input type="text" name = "apellido"value="{{isset($persons->apellido)?$persons->apellido:''}}" id = "apellido"> 
    <br>
    <Label for="Nombre"> Departamento</Label>
    <input type="text" name = "departamento"value="{{isset($persons->departamento)?$persons->departamento:''}}" id = "departamento"> 
    <br>
    <Label for="Nombre"> Encargado</Label>
    <input type="text" name = "encargado" value="{{isset($persons->encargado)?$persons->encargado:''}}" id = "encargado">
    <input type="submit" value="Guardar Datos">

    <a href="{{url('persons')}}"class="btn btn-warning" role="button">Regresar</a>