<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tecnicos
 * @package App\Models
 * @version September 24, 2018, 11:33 pm UTC
 *
 * @property string nombre
 * @property string apellidos
 * @property date fecha_nacimiento
 * @property integer nacionalidad_id
 * @property integer rol_tecnico_id
 * @property integer equipo_id
 */
class Tecnicos extends Model
{
    use SoftDeletes;

    public $table = 'tecnico';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'nacionalidad_id',
        'rol_tecnico_id',
        'equipo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'apellidos' => 'string',
        'fecha_nacimiento' => 'date',
        'nacionalidad_id' => 'integer',
        'rol_tecnico_id' => 'integer',
        'equipo_id' => 'integer'
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

    public function nacionalidad(){
        return $this->hasOne('App\Models\Nacionalidades','id','nacionalidad_id');
    }
}
