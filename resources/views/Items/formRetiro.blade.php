<div class="card">
    <div class="card-body">


        <h2>Selecciona los equipos que desea retirar</h2>
        <div class="container">
            <div class="row">
                <div class="select">
                    <select name="equip" class="form-controler">
                        <option value="">Seleccione los equipos</option>

                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select">
                    <select name="person" class="form-controler">
                        <option value="">Seleccione el encargado</option>
                        @foreach ($persona as $personas)
                            <option value="{{ $personas->nombre }}">{{ $personas->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select">
                    <select name="project" class="form-controler">
                        <option value="">Seleccione el proyecto</option>
                        @foreach ($proyecto as $proyectos)
                            <option value="{{ $proyectos->nombre }}">{{ $proyectos->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>
                <div class="cantida">
                    <div class="canti">
                        <label for="numerField">Cantidad a sacar:</label>
                        <input name="cantidad" type="number" placerholder = "Cantidad"  class="number" id="numberField">
                    </div>

                </div>



                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block">Agregar</button>

                </div>

            </div>

        </div>



    </div>

</div>
<style>
    .cantida{
        margin-top:10px;
    }
   .select {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance: none;
   outline:0;
   box-shadow:none;
   border:0!important;
   background: rgb(237, 255, 79);
   }
   .canti {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance: none;
   outline:0;

   box-shadow:none;
   border:0!important;
;
   /* position: relative;
       display: flex;
        line-height: 1;
        background: rgb(185, 185, 185);
        border-radius: .25em; */
   }
   canti{
       flex:1;


       cursor: pointer;
       font-size:1em;
       font-family: 'Open Sans', sans-serif;
   }

   select::-ms-expand{
       display: none;
   }
   .select{
       position: relative;
       display: flex;
       width: 20em;
       height: 3em;
        line-height: 3;
        background: rgb(185, 185, 185);
        border-radius: .25em;
   }
   select{
       flex:1;
       padding:0 .5em;
       color:rgb(220, 248, 94);
       cursor: pointer;
       font-size:1em;
       font-family: 'Open Sans', sans-serif;
   }
   .select::after{

       position: absolute;
       top: 0;
       right: 3em;
       padding: 0 41em;
       background: rgb(221, 255, 72);
       cursor: pointer;
       pointer-event:auto;
       transition:.25s all ease;
   }
   .select::hover{
color:rgb(255, 217, 0);
   }

</style>
