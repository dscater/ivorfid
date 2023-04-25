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

<style>
    .reporte a{
        display: flex;
        flex-direction: column;
        width: 100%;
        transition: transform 0.3s;
    }
    
    .reporte a:hover{
        transform: scale(0.95);
    }
    
    .reporte a i{
        font-size: 1.3em;
    
    }
    
    .reporte a span{
        font-size: 1.3em;
    }
    
    .reporte a span{
        margin:5px;
    }
    </style>

@endsection

@section('nom_empresa')
{{ $empresa->name }}
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            REPORTES
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_maestroProductos" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Maestro de productos</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_ingresosProductos" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Ingresos de productos</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_salidasProductos" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Salidas de productos</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_kardexInventario" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Kardex de inventario</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_movimientoProductos" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Movimiento de productos</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_libroCompras" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Libro de compras</span>
                                </a>
                            </div>
                            <div class="col-md-4 reporte">
                                <a href="#" data-toggle="modal" data-target="#m_libroVentas" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span>Libro de ventas</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
@include('reportes.modales.m_maestroProductos')
@include('reportes.modales.m_ingresosProductos')
@include('reportes.modales.m_salidasProductos')
@include('reportes.modales.m_kardexInventario')
@include('reportes.modales.m_movimientoProductos')
@include('reportes.modales.m_libroCompras')
@include('reportes.modales.m_libroVentas')
@endsection

@section('scripts')
<!-- Select Plugin Js -->
{{-- <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.js') }}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/notifications.js') }}"></script>

<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/filtro.js') }}"></script>

<script type="text/javascript">
    @if(session('success'))
    showNotification('alert-success', 'USUARIO REGISTRADO CON ÉXITO!!! ','top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
      // showSuccessMessage('Registro éxitoso','');
    @endif
</script>

@endsection
