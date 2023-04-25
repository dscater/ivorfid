<div class="modal fade in" id="m_libroVentas" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-col-light-blue">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">LIBRO DE VENTAS</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'reportes.libroVentas','method'=>'get','target'=>'_blank']) !!}
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Fecha inicio:</label>
                                <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Fecha fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">EXPORTAR</button >
                {!! Form::close() !!}
                <a class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</a>
            </div>
        </div>
    </div>    
</div>