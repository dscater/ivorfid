<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'nom','descripcion',
    ];

    public function productos()
    {
        return $this->hasMany('ivorfid\Producto','tipo_id','id');
    }
}
