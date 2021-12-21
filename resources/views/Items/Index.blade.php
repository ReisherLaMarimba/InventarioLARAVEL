@include('layouts.app')
@section('content')
<div class="container">
@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<table class="table table-light">
    <a href="{{url('items/crear')}}" class="btn btn-success">Crear Equipo en Inventario</a>
    <thead class-"thead-light">
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
</div>
