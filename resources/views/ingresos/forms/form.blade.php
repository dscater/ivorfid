<div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
            <h4 style="text-decoration: underline;">Información:</h4>
        </div>
        <div class="col-md-8">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::select('producto_id',$array_productos,null,['class'=>'form-control','required','id'=>'producto_id']) }}
                    <label class="form-label" for="producto_id">Seleccionar grupo*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::number('precio_uni',null,['class'=>'form-control','required','id'=>'precio_uni','min'=>'1']) }}
                    <label class="form-label">Precio unitario*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('rfid',null,['class'=>'form-control','required','id'=>'rfid']) }}
                    <label class="form-label">Código RFID*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('nro_fac',null,['class'=>'form-control','required','id'=>'nro_fac']) }}
                    <label class="form-label">Número de factura*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('codigo',null,['class'=>'form-control','required','id'=>'codigo']) }}
                    <label class="form-label">Código de control*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('nro_rec',null,['class'=>'form-control','required','id'=>'nro_rec']) }}
                    <label class="form-label">N° de recibo*</label>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::select('tipo',$array_tipos,null,['class'=>'form-control','required','id'=>'tipo']) }}
                    <label class="form-label" for="tipo">Tipo ingreso/salida*</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <h4 style="text-decoration: underline;">Stock actual:</h4>
        </div>
        <div class="col-md-12">
            <div class="card bg-blue stock_grupo">
                <div class="header">
                    <h4 id="titulo_grupo">GRUPO</h4>
                </div>
                <div class="body">
                    <form action="">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 stock">
                                    <p><strong>STOCK: </strong> <span id="stock">0</span></p>
                                    <p><strong>VENTA: </strong> <span id="p_venta">Bs. 0.00</span></p>
                                </div>
                                <div class="col-md-6 imagen">
                                    <img src="{{asset('imgs/productos/producto_default.png')}}" alt="Imagen" class="imagen_prod" id="imagen_prod">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

