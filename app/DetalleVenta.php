<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $fillable = [
        'cantidad','precio_uni','subtotal','precio_final',
        'descuento_sim','venta_id','producto_id'
    ];

    public function venta()
    {
        return $this->belongsTo('ivorfid\Venta','venta_id','id');
    }

    public function producto()
    {
        return $this->belongsTo('ivorfid\Producto','producto_id','id');
    }

    public function descuento()
    {
        return $this->belongsTo('ivorfid\Descuento','descuento_sim','simbolo');
    }
}
