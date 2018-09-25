<?php

namespace App\Repositories;

use App\Models\Jugadores;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JugadoresRepository
 * @package App\Repositories
 * @version September 24, 2018, 11:32 pm UTC
 *
 * @method Jugadores findWithoutFail($id, $columns = ['*'])
 * @method Jugadores find($id, $columns = ['*'])
 * @method Jugadores first($columns = ['*'])
*/
class JugadoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Jugadores::class;
    }
}
