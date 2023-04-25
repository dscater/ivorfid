@extends('layouts.admin')

@section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

<!-- Waves Effect Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Sweet Alert Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{ asset('AdminBSBMaterialDesign-master/css/style.css') }}" rel="stylesheet">

<style type="text/css">
#imagen{
    width: 120px;
    height: 140px;
}

.invalid-feedback{
    color:#F44336;
}

.archivos{
    position: relative;
}

.archivos input[type="file"]{
    position: absolute;
    top: 0;
    z-index: 100;
    position: absolute;
    opacity: 0;
}

.subir{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
    z-index: 100;
}

.subir span{
    margin-left: 5px;
    z-index: 100;
}

.subir:hover span{
    cursor: pointer;
}
.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #F44336;
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
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                        <img id="imagen_p" src="{{ asset('imgs/users/'.$user->foto) }}" alt="Imagen de perfil" width="128px" height="128px" />
                        </div>
                        <div class="content-area">
                            {!! Form::open(['route'=>['users.config_update_foto',$user->id],'method'=>'POST','class'=>'form-horizontal','id'=>'form_foto']) !!}
                            <div class="col-md-12">
                                <div class="form-line archivos">
                                    <label for="foto" class="subir">
                                        <span>Cambiar foto de perfil</span>
                                    </label>
                                    <input type="file" name="foto" id="foto" accept="image/*" onchange='cambiar()'>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <button class="btn btn-primary" id="cancelar" style="display: none">Cancelar</button>
                            <button class="btn btn-primary" id="guardar_img" style="display: none">Guardar cambios</button>
                            <h3>Usuario: {{ $user->name }}</h3>
                            <p>Tipo: {{ $user->tipo }}</p>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                {{-- <li role="presentation" class="@if(!session('contra_error')) active @endif"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Configuración de perfil</a></li> --}}
                                <li role="presentation" class="active"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Cambiar contraseña</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="change_password_settings">
                                    {!! Form::open(['route'=>['users.config_update',$user->id],'method'=>'PUT','class'=>'form-horizontal','id'=>'form_val']) !!}
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Antigua contraseña</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="oldPassword" placeholder="Antigua contraseña" required>
                                                    </div>
                                                    @if(session('contra_error') && session('contra_error') == 'old_password') 
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>La contraseña no coincide.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">Nueva contraseña</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="newPassword" placeholder="Nueva contraseña" minlength="6" required>
                                                    </div>
                                                    @if(session('contra_error') && session('contra_error') == 'comfirm') 
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Las contraseñas no coinciden. Intenten nuevamente.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nueva contraseña (Confirmar)</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirm" placeholder="Nueva contraseña (Confirmar)" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger">GUARDAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')

<!-- Select Plugin Js -->
{{-- <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Jquery Validation Plugin Css -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- JQuery Steps Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-steps/jquery.steps.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Sweet Alert Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/forms/form-validation.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/forms/basic-form-elements.js') }}"></script>

<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/ui/notifications.js') }}"></script>
<script type="text/javascript">
    $(window).ready(function(){
        $('#form_val').validate({
        rules: {
                'checkbox': {
                    required: true
                },
                'gender': {
                    required: true
                }
            },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group:first').append(error);
            }
        });


        @if(session('datos'))
        showNotification('alert-success', 'CUENTA ACTUALIZADA CON ÉXITO', 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
        // showSuccessMessage('Registro éxitoso','');
        @endif

        @if(session('password'))
        showNotification('alert-success', 'CONTRASEÑA ACTUALIZADA CON ÉXITO', 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
        // showSuccessMessage('Registro éxitoso','');
        @endif

        @if(session('contra_error'))
        showNotification('alert-danger', 'OCURRIÓ UN ERROR AL CONFIGURAR LA CONTRASEÑA.', 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
        @endif

      //EDICION DE IMAGENES
      //Previsualizar la imagen seleccionada
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
        $('#cancelar').show();
        $('#guardar_img').show();
        var result=e.target.result;
        $('#imagen_p').attr("src",result);
    }

    $('#cancelar').click(function(){
        location.reload();
    });

    $('#guardar_img').click(function(){
        var formulario = $('#form_foto');
        var url = formulario.prop('action');
        var str = new FormData(formulario[0]);
        $.ajax({
            cache: false,
            processData: false, 
            contentType: false,
            url: url,
            headers:{'X-CSRF-TOKEN':$('#token').val()},
            type: 'POST',
            dataType: 'json',
            data: str
        })
        .done(function(resp) {
            console.log("success | "+resp.msg);
            showNotification('alert-success', 'FOTO DE PERFIL ACTUALIZADO CON ÉXITO', 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
            $('#cancelar').hide();
            $('#guardar_img').hide();
            setTimeout(function(){
                location.reload();
            },2000)
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
        // for (var pair of str.entries()) {
        //             console.log(pair[0]+ ', ' + pair[1]); 
        // }
    });

});

    function cambiar(){
        var pdrs = document.getElementById('foto').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
</script>
@endsection