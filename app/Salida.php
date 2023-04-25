<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = [
        'tipo_nom','producto_id','user_id',
        'precio_uni','cantidad','descripcion','fecha_salida'
    ];

    public function tipo_ingreso()
    {
        return $this->belongsTo('ivorfid\TiposIngresoSalida','tipo_nom','nom');
    }

    public function producto()
    {
        return $this->belongsTo('ivorfid\Producto','producto_id','id');
    }

    public function user()
    {
        return $this->belongsTo('ivorfid\User','user_id','id');
    }
}
