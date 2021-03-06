@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de proyectos</h1>
    {{-- <h3 id="total" >Cantidad de equipos: ({{$totalEquip2->count()}})</h3> --}}
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
@endsection

@section('content')
{{-- 
@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<table class="table table-striped" id="iten">
    <thead>
        <tr>
            <th>Registro #</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Retirado por</th>
            <th>Fecha de Retiro</th>
            <th>Fecha de Ingreso</th>
            <th>Daño</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($item as $items)
        <tr>
            <td>{{$items->id}}</td>
            <td>{{$items->codigo}}</td>
            <td>{{$items->nombre}}</td>
            <td>{{$items->ubicacion}}</td>
            <td>{{$items->retirado_por}}</td>
            <td>{{$items->fecha_retiro}}</td>
            <td>{{$items->fecha_ingreso}}</td>
            <td>{{$items->Daño}}</td>
            <td>
                <form action="{{ url('/items/'.$items->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('Eliminar equipo')" value="Eliminar">
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
    
</table>
 --}}
<div class="card">
    <div class="card-body">
        
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Borrar</th>
            <th>Editar</th>
        
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($proyecto as $proyectos)
        <tr>
            <td>{{$proyectos->nombre}}</td>
            <td>{{$proyectos->ubicacion}}</td>
       
            <td>
                <form action="{{ url('/proyectos/'.$proyectos->id) }}" method="post" class="form-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit"  value="Borrar">
                </form>

            </td>
            <td>
                <a href="{{url('/proyectos/'.$proyectos->id.'/edit')}}"class="btn btn-warning" role="button">
                    Editar
                </a>
            </td>
           
            
          
         
            
        </tr> 
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <th>Codigo_Empleado</th>
            <th>Nombre</th>
            <th>Borrar</th>
            <th>Editar</th>
            
        </tr>
    </tfoot>
</table>
    </div>
</div>
<style>
    .table {
border-collapse: collapse;
margin: 25px 0;
font-size: 0.9em;
font-family: sans-serif;
min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.table thead tr {
background-color: #f0c126;
color: #ffffff;
text-align: left;
}
.table th,
.table td {
padding: 12px 15px;
}
.table tbody tr {
border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-of-type(even) {
background-color: #f3f3f3;
}

.table tbody tr:last-of-type {
border-bottom: 2px solid #009879;
}
.styled tbody tr.active-row {
font-weight: bold;
color: #009879;
}
</style>
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
           'El empleado ha sido borrado',
           'success'
      
        )
    </script>
    @endif
}

<script>
    $('#example').DataTable({
       responsive:true,
       autowidth:false
     });
     $('#example2').DataTable({
       responsive:true,
       autowidth:false,
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
  title: 'Quieres borrar el equipo?',
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