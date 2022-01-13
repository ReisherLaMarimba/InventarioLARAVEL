<div class="card">
    <div class="card-body">

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
        @endif


        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <Label for="Nombre"> Nombre del Item</Label>
                    <input type="text" name="nombre" value="{{ isset($items->nombre) ? $items->nombre : '' }}"
                        id="nombre">

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <Label for="Nombre"> Codigo</Label>
                        <input type="text" name="codigo" value="{{ isset($items->codigo) ? $items->codigo : '' }}"
                            id="codigo">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <Label for="Nombre"> Ubicacion</Label>
                        <input type="text" name="ubicacion"
                            value="{{ isset($items->ubicacion) ? $items->ubicacion : '' }}" id="ubicacion">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <Label for="Nombre"> Cantidad</Label>
                        <input type="number" name="cantidad"
                            value="{{ isset($items->cantidad) ? $items->cantidad : '' }}" id="cantidad">
                    </div>
                </div>
            </div>
            <br>
            
            <div class="row">

                <div class="col-md-4">
                    <input type="submit" value="Guardar Datos">

                    <a href="{{ url('items') }}"class="btn btn-info" role="button">Regresar</a>
                </div>
            </div>






            
        </div>
    </div>
</div>

<style>
.card{
    
    border-radius: 10%;
    display: flex;
    justify-content: center;
    align-items:center; 
    
}

</style>
