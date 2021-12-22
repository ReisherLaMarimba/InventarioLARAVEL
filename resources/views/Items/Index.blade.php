@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Equipos</h1>
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
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
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
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
<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Daños</th>
          
        
        </tr>
    </thead>
    <tbody>
        @foreach ($item as $items)
        <tr>
            <td>{{$items->codigo}}</td>
            <td>{{$items->nombre}}</td>
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
    <tfoot>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Daño</th>
         
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
<script>
     $('#example').DataTable({
       responsive:true,
       autowidth:false
     });
     $('#example2').DataTable({
       responsive:true,
       autowidth:false
     });
</script>
 
  
@endsection