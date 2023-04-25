<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $fillable = [
        'nom','simbolo','descripcion'
    ];
    
    public function productos()
    {
        return $this->hasMany('ivorfid\Producto','medida_id','id');
    }
}
