<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jugadores
 * @package App\Models
 * @version September 24, 2018, 11:32 pm UTC
 *
 * @property string foto
 * @property string nombre
 * @property string apellidos
 * @property date fecha_nacimiento
 * @property integer equipo_id
 * @property integer posicion_id
 * @property integer num_camiseta
 * @property string titular
 */
class Jugadores extends Model
{
    use SoftDeletes;

    public $table = 'jugadores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'foto',
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'equipo_id',
        'posicion_id',
        'num_camiseta',
        'titular'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'foto' => 'string',
        'nombre' => 'string',
        'apellidos' => 'string',
        'fecha_nacimiento' => 'date',
        'equipo_id' => 'integer',
        'posicion_id' => 'integer',
        'num_camiseta' => 'integer',
        'titular' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function equipo(){
        return $this->hasOne('App\Models\Equipos','id','equipo_id');
    }

    public function posicion(){
        return $this->hasOne('App\Models\Posiciones','id','posicion_id');
    }


}
