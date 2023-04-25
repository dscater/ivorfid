@extends('layouts.admin')

@section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Sweetalert Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('nom_empresa')
{{ $empresa->name }}
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('ventas.create') }}" class="btn btn-success">
                    <i class="material-icons">add</i>
                    <span>Nueva venta</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('productos.index') }}" class="btn btn-primary">
                    <i class="material-icons">local_offer</i>
                    <span>Ver productos</span>
                </a>
            </div>
            @if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('ingresos.create') }}" class="btn btn-info">
                    <i class="material-icons">local_shipping</i>
                    <span>Registrar ingresos</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('salidas.create') }}" class="btn btn-warning">
                    <i class="material-icons">input</i>
                    <span>Registrar salidas</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('tipos_is.index') }}" class="btn bg-deep-purple waves-effect">
                    <i class="material-icons">assignment_turned_in</i>
                    <span>Tipos ingresos/salidas</span>
                </a>
            </div>
            @endif
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LISTA DE VENTAS
                        </h2>
                    </div>
                    <div class="body">
                        <input type="text" name="url_lista" id="url_lista" value="{{ route('ventas.index') }}" hidden>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Pago total</th>
                                        <th>Fecha</th>
                                        <th>N° factura</th>
                                        <th>Cajero</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>N°</th>
                                        <th>Pago total</th>
                                        <th>Fecha</th>
                                        <th>N° factura</th>
                                        <th>Cajero</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                                <tbody id="datos_lista">
                                @php
                                    $cont = 1;        
                                @endphp
                                @foreach($ventas as $key => $venta)
                                <tr>
                                    <td>{{ $cont++ }}</td>
                                    <td>{{ $venta->pago_total }}</td>
                                    <td>{{ $venta->fecha }}</td>
                                    <td>{{ $venta->num_factura }}</td>
                                    @if($venta->user->datosUsuario)
                                    <td>{{ $venta->user->datosUsuario->nom_u }} {{ $venta->user->datosUsuario->apep_u }} {{ $venta->user->datosUsuario->apem_u }}
                                    </td>
                                    @else
                                    <td>
                                        {{ $venta->user->name }}
                                    </td>
                                    @endif
                                    <td>
                                        @if(Auth::user()->tipo == 'ADMINISTRADOR')
                                        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('ventas.destroy',$venta->id) }}" hidden>
                                        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
                                        </a>
                                        <a href="{{ route('ventas.edit',$venta->id) }}" title="Editar"><i class="material-icons editar">edit</i>
                                        </a>
                                        @endif
                                        <a href="{{ route('ventas.show',$venta->id) }}"><i class="material-icons">visibility</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>

@endsection

@section('scripts')
<!-- Select Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.js') }}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/notifications.js') }}"></script>

<script src="{{ asset('js/eliminar.js') }}"></script>

<script type="text/javascript">
    @if(session('success'))
    showNotification('alert-success', 'USUARIO REGISTRADO CON ÉXITO!!! ','top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
      // showSuccessMessage('Registro éxitoso','');
    @endif

    $('#datos_lista').on('click','tr td a.eliminar',function(e){
        e.preventDefault();
        var url_eliminar = $(this).siblings('input.url_eliminar').val();
        console.log(url_eliminar);
        let codigo = $(this).parents('tr').children('td').eq(0).text();

        let titulo = 'Eliminar';
        let texto = `¿Estás seguro(a) de eliminar el registro: ${codigo}?`;
        let tipo = 'warning';//warning es el tipo de icono que aparece en el modal
        let texto_btn = 'Si, eliminalo!';
        let titulo2 = 'Eliminado!';
        let texto2 = 'El registro se elimino con éxito!';
        let token = $('#token').val();
        let url_lista = $('#url_lista').val();

        showConfirmMessage(titulo,texto,tipo,texto_btn,titulo2,texto2,url_eliminar,token,url_lista);
    });
</script>

@endsection
