@extends('layouts.admin')

@section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Sweet Alert Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

<style type="text/css">
div.form-group.contenedor_subir{
    position: relative;
}

#foto{
max-width: 100%;
}

.subir{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
    position: absolute;
    top: 0;
    width: 100%
}

.subir span{
    margin-left: 5px;
}

.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #F44336;
}

.contenedor_foto{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.contenedor_subir .form-line.error{
    position: relative;
}

.contenedor_subir label.error{
    position: absolute;
    bottom: -40px;
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
                <a href="{{ route('productos.index') }}" class="btn btn-primary">
                    <i class="material-icons">local_offer</i>
                    <span>Ver productos</span>
                </a>
            </div>
            @if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'CAJA')
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 botones">
                <a href="{{ route('ventas.index') }}" class="btn btn-success">
                    <i class="material-icons">local_atm</i>
                    <span>Venta de productos</span>
                </a>
            </div>
            @endif
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
                    <div class="header">
                        <h2>VER PRODUCTO</h2>
                    </div>
                    <div class="body">
                        {!! Form::model($producto,['route'=>'productos.index','method'=>'get']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="text-decoration: underline;">Información:</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('cod',isset($producto) ? $producto->cod : $codigo,['class'=>'form-control','required','readonly']) }}
                                        <label class="form-label">Código del producto*</label>
                                    </div>
                                    <div class="help-info">Automático</div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('nom',null,['class'=>'form-control','readonly','required']) }}
                                        <label class="form-label">Nombre del producto*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::number('precio',null,['class'=>'form-control','readonly','required']) }}
                                        <label class="form-label">Precio*</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::number('cant_min',isset($producto)? $producto->stock->cant_min : null,['class'=>'form-control','readonly','required','min'=>'0']) }}
                                        <label class="form-label">Cantidad minima*</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('descripcion',null,['class'=>'form-control','readonly','required']) }}
                                        <label class="form-label">Descripción*</label>
                                    </div>
                                </div> 
                            </div>
                            @if(isset($producto))
                            <div class="col-md-4 contenedor_foto">
                                <img src="{{ asset('imgs/productos/'.$producto->imagen) }}" width="150" height="155" id="imagen_select">
                            </div>
                            @else
                            <div class="col-md-4 contenedor_foto">
                                <img src="{{ asset('imgs/productos/producto_default.png') }}" width="150" height="155" id="imagen_select">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('tipo',$producto->tipo->nom,['class'=>'form-control','readonly','required','id'=>'tipos']) }}
                                        <label class="form-label" for="tipos">Tipo*</label>
                                    </div>
                                </div> 
                            </div>
                        
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('medida',$producto->medida->nom,['class'=>'form-control','readonly','required','id'=>'medidas']) }}
                                        <label class="form-label" for="medidas">Medida*</label>
                                    </div>
                                </div> 
                            </div>
                        
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('marca',$producto->marca->nom,['class'=>'form-control','readonly','required','id'=>'marcas']) }}
                                        <label class="form-label" for="marcas">Marca*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('proveedor_id',$producto->proveedor->razon_social_p,['class'=>'form-control','readonly','required','id'=>'proveedores']) }}
                                        <label class="form-label" for="proveedores">Proveedor*</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('productos.index')}}" class="btn btn-primary btn-lg waves-effect" type="submit"><i class="material-icons">check</i><span>Aceptar</span></a>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</div>
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
<script src="{{asset('js/registra_producto.js')}}"></script>
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