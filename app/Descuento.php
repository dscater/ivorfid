<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
        'descuento','simbolo','descripcion'
    ];

    public function detalleVentas()
    {
        return $this->hasMany('ivorfid\DetalleVenta','descuento_sim','simbolo');
    }
    
    public function detalle_ventas()
    {
        return $this->hasMany('ivorfid\DetalleVenta','descuento_sim','simbolo');
    }
}
