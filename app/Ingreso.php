<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Ingreso extends Model
{
    protected $filable = [
        'tipo_nom','proveedor_id','producto_id','user_id',
        'precio_uni','cantidad','precio_total',
        'descripcion','codigo','nro_aut','nro_fac','nro_rec','fecha_ingreso'
    ];

    public function tipo_ingreso()
    {
        return $this->belongsTo('ivorfid\TiposIngresoSalida','tipo_nom','nom');
    }

    public function proveedor()
    {
        return $this->belongsTo('ivorfid\Proveedor','proveedor_id','id');
    }

    public function producto()
    {
        return $this->belongsTo('ivorfid\Producto','producto_id','id');
    }

    public function user()
    {
        return $this->belongsTo('ivorfid\User','user_id','id');
    }

    /* =====================================================================
                                FUNCIONES
    ======================================================================== */
    public static function libro_compras($fecha_ini,$fecha_fin)
    {
        return DB::select("SELECT SUM(i.cantidad) as cantidad, SUM(i.precio_total) as precio_total,   i.codigo, i.fecha_ingreso, i.nro_fac, p.numa_pro_p, p.razon_social_p, p.nit_pro_p 
                        FROM ingresos i 
                        JOIN proveedors p on i.proveedor_id = p.id 
                        WHERE fecha_ingreso BETWEEN '$fecha_ini' AND '$fecha_fin' 
                        GROUP BY nro_fac");
    }
}
