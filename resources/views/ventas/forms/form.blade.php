{{ Form::select('select_descuentos', $array_descuentos, null, ['id' => 'select_descuentos', 'hidden']) }}
<div class="row">
    <div class="col-md-6">
        <h4>Producto</h4>
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line">
                    {{ Form::text('rfid', null, ['class' => 'form-control', 'id' => 'rfid', 'autocomplete' => 'off']) }}
                    <label class="form-label">Agregar producto (RFID)</label>
                </div>
                <div class="help-info">Seleccione el cuadro de texto y pase la tarjeta RFID</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Información del cliente</h4>
        <div class="col-md-12">
            <table>
                <tbody>
                    <tr>
                        <td><strong>NIT/C.I.:</strong></td>
                        <td><input type="text" class="form-control input_border_0" name="nit_ci" id="nit_ci"
                                requried></td>
                        <td><button type="button" class="btn btn-primary" id="btnBuscarCliente"><i
                                    class="fa fa-search"></i> Buscar</button></td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Nombre del cliente</strong>
                        </td>
                        <td>
                            <input type="text" class="form-control input_border_0" name="nom_cli" id="nom_cli"
                                requried>
                        </td>
                        <td>
                            <div class="buscando oculto">Buscando...</div>
                            <div class="resultado_busqueda oculto">
                                <div class="cont_res"><i class="fa"></i> <span class="span_res"></span></div>
                                <input type="hidden" id="existe_cliente" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Teléfono/Celular</strong>
                        </td>
                        <td>
                            <input type="text" id="fono" class="form-control input_border_0" name="fono">
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
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
