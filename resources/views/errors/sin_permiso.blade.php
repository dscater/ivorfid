@extends('layouts.admin')

@section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Sweetalert Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<style>
.five-zero-zero-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>
@endsection

@section('nom_empresa')
{{ $empresa->name }}
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                SIN ACCESO
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="five-zero-zero-container">
                            <div class="error-code"></div>
                            <div class="error-message"><h4>USTED NO TIENE PERMISO PARA VER ESTA PÁGINA</h4></div>
                            <div class="button-place">
                                <a href="{{ route('home') }}" class="btn btn-default btn-lg waves-effect">VOLVER AL INICIO</a>
                            </div>
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

<!-- Custom Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/notifications.js') }}"></script>




@endsection
