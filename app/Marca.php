<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'nom','descripcion'
    ];

    public function productos()
    {
        return $this->hasMany('ivorifd\Producto','marca_id','id');
    }
}
