{{Form::select('select_descuentos',$array_descuentos,null,['id'=>'select_descuentos','hidden'])}}
<div class="row">
    <div class="col-md-6">
        <h4>Producto</h4>
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('rfid',null,['class'=>'form-control','id'=>'rfid','autocomplete'=>'off']) }}
                    <label class="form-label">Agregar producto (RFID)</label>
                </div>
                <div class="help-info">Seleccione el cuadro de texto y pase la tarjeta RFID</div>
            </div> 
        </div>
    </div>
    <div class="col-md-6">
        <h4>Información del cliente</h4>
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('nom_cli',null,['class'=>'form-control','id'=>'nom_cli']) }}
                    <label class="form-label">Nombre del cliente</label>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('nit_ci',null,['class'=>'form-control','required','id'=>'nit_ci']) }}
                    <label class="form-label">NIT/C.I.*</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
</div>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fa fa-shopping-cart"></i> Carrito<small> (Doble click para quitar un producto)</small></h4>
        <table class="carrito" border="1">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="productos">
                <tr class="no_hay">
                    <td colspan="6">No hay productos en el carrito</td>
                </tr>
                <tr class="total">
                    <td colspan="4">TOTAL</td>
                    <td>0</td>
                    <td>0.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>