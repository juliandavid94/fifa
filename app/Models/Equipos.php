<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipos
 * @package App\Models
 * @version September 24, 2018, 11:32 pm UTC
 *
 * @property string nombre
 * @property string bandera
 * @property string escudo
 */
class Equipos extends Model
{
    use SoftDeletes;

    public $table = 'equipos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'bandera',
        'escudo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'bandera' => 'string',
        'escudo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
