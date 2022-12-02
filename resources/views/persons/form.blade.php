<div class="card">
    <div class="card-body">

        <div class="container">

            <div class="row">
                <div class="col-md-3">



                    <Label for="Nombre"> Codigo del empleado</Label>
                    <input type="text" name="codigo_empleado"
                        value="{{ isset($persons->codigo_empleado) ? $persons->codigo_empleado : '' }}"
                        id="codigo_empleado">
                </div>
                <div class="row">
                    <div class="col-md-3">


                        <Label for="Nombre"> Nombre</Label>
                        <input type="text" name="nombre" value="{{ isset($persons->nombre) ? $persons->nombre : '' }}"
                            id="nombre">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">


                        <Label for="Nombre"> Apellido</Label>
                        <input type="text" name="apellido"
                            value="{{ isset($persons->apellido) ? $persons->apellido : '' }}" id="apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">


                        <Label for="Nombre"> Departamento</Label>
                        <input type="text" name="departamento"
                            value="{{ isset($persons->departamento) ? $persons->departamento : '' }}"
                            id="departamento">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">


                        <Label for="Nombre"> Encargado</Label>
                        <input type="text" name="encargado"
                            value="{{ isset($persons->encargado) ? $persons->encargado : '' }}" id="encargado">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">


                    <input id="crear_empleado" type="submit" value="Guardar Datos">

                    <a href="{{ url('persons') }}" class="btn btn-warning" role="button">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card {

        border-radius: 10%;
        display: flex;
        justify-content: center;
        align-items: center;

    }

</style>
