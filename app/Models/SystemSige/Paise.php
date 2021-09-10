<?php

namespace App\Models\SystemSige;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paise extends Model
{
    use SoftDeletes; 

    protected $table = 'localidades_paises';

    protected $fillable = [
        'cod_pai', 'name_pais', 'sigla_pais',
        'user_create_id', 'user_update_id', 'user_recuperar_id', 'user_delete_id',
    ];

    protected $hidden = [
        'created_at', 'update_at',
    ];

    protected $dates = [
        'delete_at',
    ];
}
