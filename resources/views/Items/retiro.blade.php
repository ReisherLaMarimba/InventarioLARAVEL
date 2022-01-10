@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Retirar equipos</h1>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/path/to/select2.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('content')

    <div class="container2">
        <form action="{{ url('/items/retiro') }}" method="GET">
            @csrf
            @include('items.formRetiro')
        </form>

        
<div class="card">
    
    <div class="card-body">
        <h4>Equipos Retirados</h4>
<table id="example3" class="table table-striped table-bordered">
    <thead>
        <tr>
            
           <th>Codigo</th>
            <th>Nombre</th>
            <th>retirado por</th>
            <th>Fecha de retiro</th>
        
          
        </tr>
    </thead>
    <tbody>
        {{-- @foreach 
        <tr>
         
            <td>{{}}</td>
            <td>{{}}</td>
            <td>{{}}</td>
            <td>{{}}</td>
          
         
            
        </tr> 
        @endforeach --}}
       
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
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(".form-control").select2({
                theme: "bootstrap4"

            });
        </script>
        
    @stop
