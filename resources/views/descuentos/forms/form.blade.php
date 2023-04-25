<div class="row">
    <div class="col-md-12">
        <h4 style="text-decoration: underline;">Información:</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::number('descuento',null,['class'=>'form-control','required','min'=>'0']) }}
                <label class="form-label">Descuento*</label>
            </div>
        </div> 
    </div>
    <div class="col-md-6">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('simbolo',null,['class'=>'form-control','required']) }}
                <label class="form-label">Simbolo*</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::text('descripcion',null,['class'=>'form-control']) }}
                <label class="form-label">Descripción</label>
            </div>
        </div>
    </div>
</div>
