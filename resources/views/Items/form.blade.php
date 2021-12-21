<Label for="Nombre"> Nombre del Item</Label>
    <input type="text" name = "nombre" value="{{$items->nombre}}" id="nombre">
    <br>
    <Label for="Nombre"> Codigo</Label>
    <input type="text" name = "codigo" value="{{$items->codigo}}"id = "codigo">
    <br>
    <Label for="Nombre"> Ubicacion</Label>
    <input type="text" name = "ubicacion"value="{{$items->ubicacion}}" id = "ubicacion"> 
    <br>
    <Label for="Nombre"> Retirado Por</Label>
    <input type="text" name = "retirado_por" value="{{$items->retirado_por}}" id = "retirado_por">
    <br>
    <Label for="Nombre"> Fecha del Retiro</Label>
    <input type="date" name = "fecha_retiro" value="{{$items->fecha_retiro}}"id = "fecha_retiro">
    <br>
    <Label for="Nombre"> Fecha de Devuelta</Label>
    <input type="date" name = "fecha_ingreso" value="{{$items->fecha_ingreso}}"id= "fecha_ingreso">
    <br>
    <Label for="Nombre"> Algun daño?</Label>
    <input type="text" name = "Daño"value="{{$items->Daño}}" id="Daño">

    <input type="submit" value="Guardar Datos">