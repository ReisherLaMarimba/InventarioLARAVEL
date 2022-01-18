@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Empleados</h1>
    {{-- <h3 id="total" >Cantidad de equipos: ({{$totalEquip2->count()}})</h3> --}}
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

@endsection

@section('content')

<div class="card">
    <div class="card-body">
        
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Codigo_Empleado</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Departamento</th>
            <th>Encargado</th>
            <th>Borrar</th>
            <th>Editar</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($person as $persons)
        <tr>
            <td>{{$persons->codigo_empleado}}</td>
            <td>{{$persons->nombre}}</td>
            <td>{{$persons->apellido}}</td>
            <td>{{$persons->departamento}}</td>
            <td>{{$persons->encargado}}</td>
            <td>
                <form action="{{ url('/persons/'.$persons->id) }}" method="post" class="form-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit"  value="Borrar">
                </form>

            </td>
            <td>
                <a href="{{url('/persons/'.$persons->id.'/edit')}}"class="btn btn-warning" role="button">
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
            <th>Apellido</th>
            <th>Departamento</th>
            <th>Encargado</th>
            <th>Borrar</th>
            <th>Editar</th>
            
        </tr>
    </tfoot>
</table>
    </div>
</div>


<div class="footer-basic">
    <footer>
        <div class="social"><a href="https://www.instagram.com/reisher_mella/"><i class="icon ion-social-instagram"></i></a><a href="https://www.facebook.com/profile.php?id=100009537548632"><i class="icon ion-social-facebook"></i></a></div>
     
        <p class="copyright">Reisher Mella© 2022</p>
    </footer>
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
.footer-basic .social {
  text-align:center;
  padding-bottom:25px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}

.footer-basic .social > a:hover {
  opacity:0.9;
}

.footer-basic .copyright {
  margin-top:5px;
  text-align:center;
  font-size:13px;
  color:#aaa;
  margin-bottom:0;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
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