<?php

namespace App\Repositories;

use App\Models\Equipos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EquiposRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:32 pm UTC
 *
 * @method Equipos findWithoutFail($id, $columns = ['*'])
 * @method Equipos find($id, $columns = ['*'])
 * @method Equipos first($columns = ['*'])
*/
class EquiposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'bandera',
        'escudo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Equipos::class;
    }
}
