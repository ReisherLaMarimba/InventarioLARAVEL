<Label for="Nombre"> Nombre del Item</Label>
    <input type="text" name = "nombre" value="{{isset($items->nombre)?$items->nombre:''}}" id="nombre">
    <br>
    <Label for="Nombre"> Codigo</Label>
    <input type="text" name = "codigo" value="{{isset($items->codigo)?$items->codigo:''}}"id = "codigo">
    <br>
    <Label for="Nombre"> Ubicacion</Label>
    <input type="text" name = "ubicacion"value="{{isset($items->ubicacion)?$items->ubicacion:''}}" id = "ubicacion"> 
    <br>
    <Label for="Nombre"> Retirado Por</Label>
    <input type="text" name = "retirado_por" value="{{isset($items->retirado_por)?$items->retirado_por:''}}" id = "retirado_por">
    <br>
    <Label for="Nombre"> Fecha del Retiro</Label>
    <input type="date" name = "fecha_retiro" value="{{isset($items->fecha_retiro)?$items->fecha_retiro:''}}"id = "fecha_retiro">
    <br>
    <Label for="Nombre"> Fecha de Devuelta</Label>
    <input type="date" name = "fecha_ingreso" value="{{isset($items->fecha_ingreso)?$items->fecha_ingreso:''}}"id= "fecha_ingreso">
    <br>
    <Label for="Nombre"> Algun daño?</Label>
    <input type="text" name = "Daño"value="{{isset($items->Daño)?$items->Daño:''}}" id="Daño">

    <input type="submit" value="Guardar Datos">

    <a href="{{url('items')}}">Regresar</a>