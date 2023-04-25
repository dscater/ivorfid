<div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
            <h4 style="text-decoration: underline;">Información:</h4>
        </div>
        <div class="col-md-8">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('rfid',null,['class'=>'form-control','required','id'=>'rfid']) }}
                    <label class="form-label">Código RFID*</label>
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::number('precio_uni',null,['class'=>'form-control','required','id'=>'precio_uni']) }}
                    <label class="form-label">Precio unitario*</label>
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
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::textarea('descripcion',null,['class'=>'form-control','required','id'=>'descripcion','rows'=>'2']) }}
                    <label class="form-label">Descripción*</label>
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
                                    <p><strong>PRECIO VENTA: </strong> <span id="p_venta">Bs. 0.00</span></p>
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

