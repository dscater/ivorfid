<?php

namespace ivorfid;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class DatosUsuario extends Model
{
    protected $fillable = [
        'nom_u','apep_u','apem_u','ci_u',
        'ci_exp_u','fecha_nac_u','genero_u','dir_dpto_u',
        'dir_ciudad_u','dir_zv_u','dir_ac_u','dir_num_u',
        'fono_u','cel_u','email_u','foto_u',
        'fecha_reg','user_id'
    ];

    /* =================================================== 
                            RELACIONES
    ====================================================== */
    public function user()
    {
        return $this->belongsTo('ivorfid\User','user_id','id');
    }

    /*============================================================== 
                        FUNCIONES
      ==============================================================*/
    
    public static function lista()
    {
        return DB::select("SELECT du.id as datos_id, CONCAT(du.nom_u,' ',du.apep_u,' ',du.apem_u) AS nombre, CONCAT(du.ci_u,' ',du.ci_exp_u) AS ci, du.genero_u, du.fono_u, du.cel_u, du.foto_u, u.tipo,u.name as codigo, u.id as user_id 
                        FROM datos_usuarios du
                        INNER JOIN  users u on u.id = du.user_id
                        WHERE u.status = 1");
    }
}
