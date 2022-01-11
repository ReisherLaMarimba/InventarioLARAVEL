@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Equipos</h1>
    {{-- <h3 id="total" >Cantidad de equipos: ({{$totalEquip->count()}})</h3> --}}
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Cantidad</th>
            <th>Retirado Por</th>
            <th>Fecha de retiro</th>
            <th>Fecha de ingreso</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($item as $items)
        <tr>
            <td>{{$items->codigo}}</td>
            <td>{{$items->nombre}}</td>
            <td>{{$items->ubicacion}}</td>
            <td>{{$items->cantidad}}</td>
            <td>{{$items->retirado_por}}</td>
            <td>{{$items->fecha_retiro}}</td>
            <td>{{$items->fecha_ingreso}}</td>
           
            
          
         
            
        </tr> 
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Cantidad</th>
            <th>Retirado Por</th>
            <th>Fecha de retiro</th>
            <th>Fecha de ingreso</th>
        </tr>
    </tfoot>
</table>
    </div>
</div>

<div class="card">
    
    <div class="card-body">
        <h4>Editar / Borrar  los  Equipos</h4>
<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th></th>
           <th>Codigo</th>
            <th>Nombre</th>
            <th>Daño</th>
            <th>Borrar</th>
            <th>Eliminar</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($item as $items)
        <tr>
            <td></td>
            <td>{{$items->codigo}}</td>
            <td>{{$items->nombre}}</td>
            <td>{{$items->Daño}}</td>
            <td>
                <form action="{{ url('/items/'.$items->id) }}" method="post" class="form-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit"  value="Borrar">
                </form>

            </td>
            <td>
                <a href="{{url('/items/'.$items->id.'/edit')}}">
                    Editar
                </a>
            </td>
           
         
            
        </tr> 
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Daño</th>
            <th>Borrar</th>
            <th>Eliminar</th>
            
           
        </tr>
    </tfoot>
</table>
    </div>
</div>


<div class="card">
    
    <div class="card-body">
        <h4>Equipos Retirados</h4>
<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            
           <th>Codigo</th>
            <th>Nombre</th>
            <th>retirado por</th>
            <th>Fecha de retiro</th>
        
          
        </tr>
    </thead>
    <tbody>
        @foreach ($retirado as $retirados)
        <tr>
         
            <td>{{$retirados->codigo}}</td>
            <td>{{$retirados->nombre}}</td>
            <td>{{$retirados->retirado_por}}</td>
            <td>{{$retirados->fecha_retiro}}</td>
            <td>
                <form action="{{ url('/items/ingreso/'.$items->id)   }}" method="get">
                    <div class="col-md-2">
                        <button type= "submit" >Agregar</button>
    
                    </div>
                    
                </form>
            </td>
         
            
        </tr> 
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Retirado por</th>
            <th>Fecha de retiro</th>
       
            
           
        </tr>
    </tfoot>
</table>
    </div>
</div>
@stop



@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@if (session('eliminar')=='Borrado'){
    <script>
     Swal.fire(
           'Eliminado',
           'El equipo ha sido borrado',
           'success'
      
        )
    </script>
    @endif
}

<script>
    $('#example').DataTable({
       responsive:true,
       autowidth:true
     });
     $('#example2').DataTable({
       responsive:true,
       autowidth:true,
       columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    
     });
     
     
     $('.form-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
  title: 'Quieres borrar el equipo',
  text: "Una vez dicho si, el equipo sera eliminado",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borralo'
}).then((result) => {
  if (result.isConfirmed) {
 
    this.submit();
  }
})
     });
</script>
 
  
@endsection