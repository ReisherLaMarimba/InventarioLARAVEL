@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Retirar equipos</h1>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('content')
    <div class="card">
        <div class="card-body">

        
    <div class="container2">
        <form action="{{ url('/items/retiro') }}" method="GET" class="form-retirar">
            @csrf
            @include('items.formRetiro')
        </form>
    </div>
</div>
        


      
    @stop



    @section('js')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>   
        
        
        <script>
            $(".form-controler").select2({
                theme: "bootstrap4"

            });
            

            $('.form-retirar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Quieres retirar este equipo?',
                text: "Una vez dicho si, el equipo sera retirado con fecha de hoy",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, retirar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
        </script>
        
    @stop
