<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class TiposIngresoSalida extends Model
{
    protected $fillable = [
        'nom','descripcion'
    ];

    protected $table = 'tipo_ingreso_salida';

    public function ingresos()
    {
        return $this->hasMany('ivorfid\Ingreso','tipo_nom','nom');
    }

    public function salidas()
    {
        return $this->hasMany('ivorfid\Salida','tipo_nom','nom');
    }
}
