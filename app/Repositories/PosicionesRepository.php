<?php

namespace App\Repositories;

use App\Models\Posiciones;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PosicionesRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:33 pm UTC
 *
 * @method Posiciones findWithoutFail($id, $columns = ['*'])
 * @method Posiciones find($id, $columns = ['*'])
 * @method Posiciones first($columns = ['*'])
*/
class PosicionesRepository extends BaseRepository
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
        return Posiciones::class;
    }
}
