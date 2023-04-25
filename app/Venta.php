<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'pago_total','pago_venta','fecha','num_factura',
        'codigo','codigo_qr','observacion','estado',
        'fecha_venta','fecha_lim_emi','users_id','cliente_id'
    ];

    public function user()
    {
        return $this->belongsTo('ivorfid\User','users_id','id');
    }

    public function cliente()
    {
        return $this->belongsTo('ivorfid\Cliente','cliente_id','id');
    }

    public function detalle_ventas()
    {
        return $this->hasMany('ivorfid\DetalleVenta','venta_id','id');
    }
}
