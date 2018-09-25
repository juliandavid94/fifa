<?php

namespace App\Repositories;

use App\Models\Rol_tecnico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Rol_tecnicoRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:33 pm UTC
 *
 * @method Rol_tecnico findWithoutFail($id, $columns = ['*'])
 * @method Rol_tecnico find($id, $columns = ['*'])
 * @method Rol_tecnico first($columns = ['*'])
*/
class Rol_tecnicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rol_tecnico::class;
    }
}
