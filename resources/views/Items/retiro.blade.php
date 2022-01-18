@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Retirar equipos</h1>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
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
                            <th>ingresar</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($retiros as $retirados)

                            <tr>

                                <td>{{ $retirados->codigo }}</td>
                                <td>{{ $retirados->nombre }}</td>
                                <td>{{ $retirados->retirado_por }}</td>
                                <td>{{ $retirados->fecha_retiro }}</td>
                                <td>
                                    <form action="{{ url('/items/ingreso/' . $retirados->id) }}" method="POST"
                                        class="form-ingresar">
                                        @csrf
                                        <div class="col-md-2">
                                            <button type="submit">Ingresar</button>

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
                            <th>ingresar</th>


                        </tr>
                    </tfoot>
                </table>
                <button type="button" id="button">Enviar a conduce</button>
            </div>
        </div>
        <div class="container2">
        <div class="card">
            <div class="card-body">
                <h3>Seleccione arriba los esquipos para realizar conduce de salida</h3>
                <div id="events">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>

                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>retirado por</th>
                                <th>Fecha de retiro</th>


                            </tr>
                        </thead>
                        <tbody>





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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
        <script>
            //           var events = $('#events');
            // var table = $('#example2').DataTable( {
            //     dom: 'Bfrtip',
            //     select: true,
            //     buttons: [
            //         {
            //             text: 'Get selected data',
            //             action: function () {
            //                 var count = table.rows( { selected: true } ).data();

            //                 events.prepend( '<div>'+count+' row(s) selected</div>' );
            //             }
            //         }
            //     ]
            // } );

            var oTable = $('#example2').DataTable();
            var events = $('#table');
            $('#example2 tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
                var pos = oTable.row(this).index();
                var row = oTable.row(pos).data();
                console.log(row);
            });

            $('#button').click(function() {
                var oData = oTable.rows('.selected').data();
                var tabla = $('#table').DataTable();
                for (var i = 0; i < oData.length; i++) {
                    //    alert("Name: " + oData[i][0] + " Position: " + oData[i][1] + " Office: " + oData[i][2]);

                    tabla.row.add([
                        '<td>' + oData[i][0] + '</td>',
                        '<td>' + oData[i][1] + '</td>',
                        '<td>' + oData[i][2] + '</td>',
                        '<td>' + oData[i][3] + '</td>',
                    ]).draw(false);






                    // events.live(


                    //     '<tr>',
                    //     '<td>' + oData[i][0] + '</td>',
                    //     '<td>' + oData[i][1] + '</td>',
                    //     '<td>' + oData[i][2] + '</td>',
                    //     '<td>' + oData[i][3] + '</td>',
                    //     '</tr>'

                    // );


                }

            });
        </script>
        <script>
            $('#table').DataTable({

                responsive: "true",
                dom: 'Bfrtilp',

                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar Excel',
                        className: 'btn btn-success',
                        orientation: 'landscape'
                       
                   
                        


                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar PDF',
                        className: 'btn btn-danger',
                        orientation: 'landscape'
                        
                        
                        
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        orientation: 'landscape'
                      

                    }

                ],



            });
        </script>


        <script>
            $(".form-controler").select2({
                theme: "bootstrap4"

            });
        </script>

        @if (session('ingresar') == 'ingresado'){
            <script>
                Swal.fire(
                    'Ingreso correcto',
                    'El equipo ha sido insertado con exito',
                    'success'

                )
            </script>
        @endif
        }

        @if (session('retirar') == 'retirado'){
            <script>
                Swal.fire(
                    'Retiro correcto',
                    'El equipo ha sido retirado con exito',
                    'success'

                )
            </script>
        @endif
        }


        <script>
            $('.form-retirar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Deseas retirar este equipo?',
                    text: "Una vez dicho si, el equipo sera retirado al inventario con fecha actual",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ingresar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();
                    }
                })
            });
            $('.form-ingresar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Deseas ingresar este equipo?',
                    text: "Una vez dicho si, el equipo sera ingresado al inventario con fecha actual",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ingresar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();
                    }
                })
            });
        </script>

    @stop
