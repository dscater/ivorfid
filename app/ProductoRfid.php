<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class ProductoRfid extends Model
{
    protected $fillable = [
        'rfid','producto_id','estado'
    ];

    public function producto()
    {
        return $this->belongsTo('ivorfid\Producto','producto_id','id');
    }
}
