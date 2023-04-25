<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Información:</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('nom_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Nombre(s)*</label>
            </div>
        </div> 
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('apep_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Apellido paterno*</label>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('apem_u',null,['class'=>'form-control']) }}
                <label class="form-label">Apellido materno</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::number('ci_u',null,['class'=>'form-control','required','min'=>'0']) }}
                <label class="form-label">Cédula de identidad*</label>
            </div>
        </div> 
    </div>
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('ci_exp_u',[
                    ''=> '',
                    'LP'=> 'LA PAZ',
                    'CB'=> 'COCHABAMBA',
                    'SC'=> 'SANTA CRUZ',
                    'OR'=> 'ORURO',
                    'PT'=> 'POTOSI',
                    'CH'=> 'CHUQUISACA',
                    'TJ'=> 'TARIJA',
                    'BN'=> 'BENI',
                    'PD'=> 'PANDO',
                    ],null,['class'=>'form-control','id'=>'select_ci','required']) }}
                <label class="form-label" for="select_ci">Expedido*</label>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('genero_u',[
                    ''=> '',
                    'M'=> 'MASCULINO',
                    'F'=> 'FEMENINO',
                    ],null,['class'=>'form-control','id'=>'select_ci','required']) }}
                <label class="form-label" for="select_ci">Género*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::date('fecha_nac_u',isset($datosUsuario)?$datosUsuario->fecha_nac_u : date('Y-m-d'),['class'=>'form-control','id'=>'fecha_nac_u','required']) }}
                <label class="form-label">Fecha de nacimiento*</label>
            </div>
        </div>
    </div>
    @if(isset($datosUsuario))
    <div class="col-md-3 contenedor_foto">
        <img src="{{ asset('imgs/personal/'.$datosUsuario->foto_u) }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="foto_u" class="file" id="foto">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Elegir foto*</span>
                </label>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-3 contenedor_foto">
        <img src="{{ asset('imgs/users/user_default.png') }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="foto_u" class="file" id="foto" required="">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Elegir foto*</span>
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
                {{ Form::text('dir_dpto_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Departamento*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_ciudad_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Ciudad*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_zv_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Zona/Villa*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_ac_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Avenida/Calle*</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('dir_num_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Número*</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Contacto:</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::email('email_u',null,['class'=>'form-control']) }}
                <label class="form-label">Email</label>
            </div>
        </div> 
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('fono_u',null,['class'=>'form-control']) }}
                <label class="form-label">Teléfono</label>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('cel_u',null,['class'=>'form-control','required']) }}
                <label class="form-label">Celular*</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @if(isset($datosUsuario))
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
            {{ Form::select('tipo',[
                ''=> '',
                'ADMINISTRADOR'=> 'ADMINISTRADOR',
                'ALMACENERO'=> 'ALMACENERO',
                'CAJA'=> 'CAJA',
                ],$datosUsuario->user->tipo,['class'=>'form-control','id'=>'select_ci','required','id'=>'select_tipo']) }}
                <label class="form-label" for="select_tipo">Tipo de usuario*</label>
            </div>
        </div> 
    </div>
    @else
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
            {{ Form::select('tipo',[
                ''=> '',
                'ADMINISTRADOR'=> 'ADMINISTRADOR',
                'ALMACENERO'=> 'ALMACENERO',
                'CAJA'=> 'CAJA',
                ],null,['class'=>'form-control','id'=>'select_ci','required','id'=>'select_tipo']) }}
                <label class="form-label" for="select_tipo">Tipo de usuario*</label>
            </div>
        </div> 
    </div>
    @endif
</div>