@extends('layouts.admin')

@section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Sweet Alert Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

<style type="text/css">
.titulo{
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: auto;
    margin-top: 80px;
    width: 450px;
}

.titulo h2{
    text-align: center;
}

.titulo_derecha{
    position: absolute;
    top: 10px;
    right:45px;
}

.titulo_derecha h2{
    color:#006cd9;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.logo{
    width: 160px;
    height: 140px;
    position: absolute;
    top:20px;
    left: 20px;
}

.datos_factura{
    position: relative;
    width: 100%;
    display: flex;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: auto;
    margin-top: 35px;
}

.datos_factura .facturar_a{
    width: 50%;
}

.datos_factura .num_fac{
    width: 50%;  
}

.factura{
    position: relative;
    width: 100%;
}

.factura thead tr{
    background:#0080ff;
    color:white;
}

.factura thead tr th{
    text-align: center;
}

.factura tbody tr td{
    text-align: center;
}

.factura tbody tr.total td:first-child{
    text-align: right;
    padding-right: 15px;
}

.factura tbody tr.total_final td:nth-child(5n), tr.total_final td:nth-child(6n){
    background:#0080ff;
    color:white;
}
.info1{
    text-align: center;
    font-weight: bold;
    font-size: 0.75em;
}
.info2{
    text-align: center;
    font-weight: bold;
    font-size: 0.65em;
}

</style>

@endsection

@section('nom_empresa')
{{ $empresa->nom }}
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('ventas.index') }}" class="btn btn-success">
                    <i class="material-icons">local_atm</i>
                    <span>Ver ventas</span>
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
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset('imgs/empresa/'.$empresa->logo)}}" class="logo" alt="">
                                <div class="titulo">
                                    <h2>{{$empresa->name}}</h2>
                                </div>
                                <div class="titulo_derecha">
                                    <h2>Factura</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="datos_factura">
                                    <div class="facturar_a">
                                        <p><strong>A nombre de: </strong> {{$venta->cliente->nom_cli}}</p>
                                        <p><strong>NIT/C.I.: </strong>{{$venta->cliente->nit_ci}}</p>
                                    </div>
                                    <div class="num_fac">
                                        <p><strong>Factura N°: </strong> {{$venta->num_factura}}</p>
                                        <p><strong>Fecha: </strong> {{$venta->fecha}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="factura">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>PRODUCTO</th>
                                            <th>P/U.(Bs.)</th>
                                            <th>DESCUENTO %</th>
                                            <th>CANTIDAD</th>
                                            <th>SUBTOTAL (Bs.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;   
                                        @endphp
                                        @foreach($venta->detalle_ventas as $key => $value)
                                        <tr>
                                            <td>{{$cont++}}</td>
                                            <td>{{ $value->producto->nom }}</td>
                                            <td>{{ $value->precio_uni }}</td>
                                            <td>{{ $value->descuento->descuento * 100 }}%</td>
                                            <td>{{ $value->cantidad }}</td>
                                            <td>{{ $value->subtotal }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="total_final">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>
                                                TOTAL FINAL (Bs.)
                                            </td>
                                            <td>
                                                {{$venta->pago_venta}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info1">
                                    "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ÉSTA SERA SANCIONADO A LEY"
                                </div>
                                <div class="info2">
                                    Ley Nº 453: El proveedor debe exhibir certificaciones de habilitación o documentos que acrediten las capacidades u ofertas de servicios.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('ventas.factura',$venta->id)}}" target="_blank" class="btn btn-lg btn-primary">
                                    <i class="material-icons">file_download</i>
                                    <span>Exportar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</section>

@endsection

@section('scripts')
<!-- Select Plugin Js -->
{{-- <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Jquery Validation Plugin Css -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- JQuery Steps Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-steps/jquery.steps.js') }}"></script>

<!-- Sweet Alert Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.js') }}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/forms/form-validation.js') }}"></script>

<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/notifications.js') }}"></script>
<script type="text/javascript">
    @if(session('success'))
    showNotification('alert-success', 'REGISTRO ÉXITOSO!!! ','top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
      // showSuccessMessage('Registro éxitoso','');
    @endif

    $('body').on('change','#foto',function(e){
        addImage(e);
    });

    function addImage(e){
        var file = e.target.files[0],
        imageType = /image.*/;

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.onload = fileOnload;
        reader.readAsDataURL(file);
    }

    function fileOnload(e) {
        var result=e.target.result;
        $('#imagen_select').attr("src",result);
    }

</script>
@endsection