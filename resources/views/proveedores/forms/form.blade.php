<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Información:</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('razon_social_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Razón social*</label>
            </div>
        </div> 
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('nit_pro_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">NIT*</label>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('numa_pro_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Número de autorización*</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('fono_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Teléfono*</label>
            </div>
        </div> 
    </div>
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('fono_alt_p',null,['class'=>'form-control']) }}
                <label class="form-label">Teléfono alternativo</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('fax_p',null,['class'=>'form-control']) }}
                <label class="form-label">Fax</label>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::email('email_p',null,['class'=>'form-control']) }}
                <label class="form-label">Correo</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('web_p',null,['class'=>'form-control']) }}
                <label class="form-label">Web</label>
            </div>
        </div> 
    </div>
    @if(isset($proveedor))
    <div class="col-md-3 contenedor_foto">
        <img src="{{ asset('imgs/proveedores/'.$proveedor->logo_p) }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="logo_p" class="file" id="foto">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Elegir logo*</span>
                </label>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-3 contenedor_foto">
        <img src="{{ asset('imgs/proveedores/proveedor_default.png') }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="logo_p" class="file" id="foto" required="">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Elegir logo*</span>
                </label>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Dirección:</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_dpto_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Departamento*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_ciudad_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Ciudad*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_zv_p',null,['class'=>'form-control','required']) }}
                <label class="form-label" for="select_ci">Zona/Villa*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_ac_p',null,['class'=>'form-control','id'=>'fecha_nac_u','required']) }}
                <label class="form-label">Avenida/Calle*</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_nro_p',null,['class'=>'form-control','id'=>'fecha_nac_u','required']) }}
                <label class="form-label">Número*</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Representante:</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('nom_rep_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Nombre(s)*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('apep_rep_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Apellido paterno*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('apem_rep_p',null,['class'=>'form-control']) }}
                <label class="form-label">Apellido materno</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('cel_rep_p',null,['class'=>'form-control','required']) }}
                <label class="form-label">Celular*</label>
            </div>
        </div>
    </div>
</div>