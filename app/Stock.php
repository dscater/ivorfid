<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'cant_ingresos','cant_actual','cant_salidas','cant_min',
        'fecha_movimiento','fecha_reg','producto_id'
    ];

    public function producto()
    {
        return $this->belongsTo('ivorfid\Producto','producto_id','id');
    }
}
