<?php

namespace App\Repositories;

use App\Models\Nacionalidades;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NacionalidadesRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:33 pm UTC
 *
 * @method Nacionalidades findWithoutFail($id, $columns = ['*'])
 * @method Nacionalidades find($id, $columns = ['*'])
 * @method Nacionalidades first($columns = ['*'])
*/
class NacionalidadesRepository extends BaseRepository
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
        return Nacionalidades::class;
    }
}
