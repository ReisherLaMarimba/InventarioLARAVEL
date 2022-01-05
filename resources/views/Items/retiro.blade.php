@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Retirar equipos</h1>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/path/to/select2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('content')

    <div class="container2">
<form action="{{url('/items')}}"method="post">
    @csrf
    {{-- {{method_field('PATCH')}} --}}
    @include('items.formRetiro')
    <div class="card">
        <div class="card-body">
            <h3>Listado en proceso de retiro</h3>

            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        
                        <th>Nombre</th>
                        
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opcion as $opcions)
                    <tr>
                        <td>{{$opcions}}</td>
                    
                       
                        
                      
                     
                        
                    </tr> 
                    @endforeach
                   
                </tbody>
                <tfoot>
                    <tr>
                      
                        <th>Nombre</th>
                   
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</form>
</div>
@stop



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".form-control").select2({
            theme: "bootstrap4"

        });
 
      
    </script>
@stop
