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
                {{ Form::text('nom',null,['class'=>'form-control','required']) }}
                <label class="form-label">Nombre del producto*</label>
            </div>
            @if ($errors->has('nom'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::number('precio',null,['class'=>'form-control','required']) }}
                <label class="form-label">Precio*</label>
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::number('cant_min',isset($producto)? $producto->stock->cant_min : null,['class'=>'form-control','required','min'=>'0']) }}
                <label class="form-label">Cantidad minima*</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('descripcion',null,['class'=>'form-control','required']) }}
                <label class="form-label">Descripción*</label>
            </div>
        </div> 
    </div>
    @if(isset($producto))
    <div class="col-md-4 contenedor_foto">
        <img src="{{ asset('imgs/productos/'.$producto->imagen) }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="imagen" class="file" id="foto">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Seleccionar imagen*</span>
                </label>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-4 contenedor_foto">
        <img src="{{ asset('imgs/productos/producto_default.png') }}" width="150" height="155" id="imagen_select">
        <div class="form-group form-float contenedor_subir">
            <div class="form-line">
                <input type="file" accept="image/*" style='opacity: 0;' name="imagen" class="file" id="foto" required="">
                <label class="subir"for="foto">
                    <i class="fa fa-image"></i> <span>Seleccionar imagen*</span>
                </label>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('tipo_id',$array_tipos,null,['class'=>'form-control','required','id'=>'tipos']) }}
                <label class="form-label" for="tipos">Tipo*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('medida_id',$array_medidas,null,['class'=>'form-control','required','id'=>'medidas']) }}
                <label class="form-label" for="medidas">Medida*</label>
            </div>
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('marca_id',$array_marcas,null,['class'=>'form-control','required','id'=>'marcas']) }}
                <label class="form-label" for="marcas">Marca*</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select('proveedor_id',$array_proveedores,null,['class'=>'form-control','required','id'=>'proveedores']) }}
                <label class="form-label" for="proveedores">Proveedor*</label>
            </div>
        </div>
    </div>
</div>