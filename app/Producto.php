<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Producto extends Model
{
    protected $fillable = [
        'cod','rfid','nom','precio',
        'descripcion','imagen','tipo_id','medida_id',
        'marca_id','proveedor_id','user_id','fecha_reg'
    ];

    public function tipo()
    {
        return $this->belongsTo('ivorfid\Tipo','tipo_id','id');
    }

    public function medida()
    {
        return $this->belongsTo('ivorfid\Medida','medida_id','id');
    }

    public function marca()
    {
        return $this->belongsTo('ivorfid\Marca','marca_id','id');
    }

    public function proveedor()
    {
        return $this->belongsTo('ivorfid\Proveedor','proveedor_id','id');
    }

    public function user()
    {
        return $this->belongsTo('ivorfid\User','user_id','id');
    }

    public function stock()
    {
        return $this->hasOne('ivorfid\Stock','producto_id','id');
    }

    public function detalle_ventas()
    {
        return $this->hasMany('ivorfid\DetalleVenta','producto_id','id');
    }

    public function ingresos()
    {
        return $this->hasMany('ivorfid\Ingreso','producto_id','id');
    }

    public function salidas()
    {
        return $this->hasMany('ivorfid\Salida','producto_id','id');
    }

    public function productosRfid()
    {
        return $this->hasMany('ivorfid\ProductoRfid','producto_id','id');
    }

    /* =========================================================
                            FUNCIONES
    ============================================================= */
    public static function lista()
    {
        return DB::select("SELECT p.id, p.cod,p.nom,p.precio,p.descripcion,p.imagen,t.nom as tipo,m.nom as marca,md.simbolo as medida,s.cant_actual,s.cant_min, pv.razon_social_p
                        FROM productos p
                        JOIN tipos t on t.id = p.tipo_id
                        JOIN marcas m on m.id = p.marca_id
                        JOIN medidas md on md.id = p.medida_id
                        JOIN proveedors pv on pv.id = p.proveedor_id
                        JOIN stocks s on s.producto_id = p.id
                        WHERE p.status = 1");
    }

    public static function nombre_grupo($producto)
    {
        return DB::select("SELECT nom, imagen, precio 
                        FROM productos 
                        WHERE id = $producto");
    }
}
