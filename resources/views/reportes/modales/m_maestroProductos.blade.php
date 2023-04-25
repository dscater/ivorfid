<div class="modal fade in" id="m_maestroProductos" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-col-light-blue">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">MAESTRO DE PRODUCTOS</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'reportes.maestroProductos','method'=>'get','target'=>'_blank']) !!}
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Filtro:</label>
                                <select class="form-control" name="filtro" id="filtro">
                                    <option value="TODOS">TODOS</option>
                                    <option value="TIPO">POR TIPO</option>
                                    <option value="MARCA">POR MARCA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Marca:</label>
                                <select class="form-control" name="marca" id="marca">
                                    <option value="TODOS">TODOS</option>
                                    @foreach($marcas as $key => $value)
                                        <option value="{{$value->nom}}">{{$value->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Tipo:</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="TODOS">TODOS</option>
                                    @foreach($tipos as $key => $value)
                                        <option value="{{$value->nom}}">{{$value->nom}}</option>
                                    @endforeach
                                </select>
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