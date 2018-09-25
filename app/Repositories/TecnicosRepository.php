<?php

namespace App\Repositories;

use App\Models\Tecnicos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TecnicosRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:33 pm UTC
 *
 * @method Tecnicos findWithoutFail($id, $columns = ['*'])
 * @method Tecnicos find($id, $columns = ['*'])
 * @method Tecnicos first($columns = ['*'])
*/
class TecnicosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'nacionalidad_id',
        'rol_tecnico_id',
        'equipo_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tecnicos::class;
    }
}
