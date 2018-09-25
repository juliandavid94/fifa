<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Jugadores;
use App\Models\Posiciones;
use App\Http\Requests\CreateJugadoresRequest;
use App\Http\Requests\UpdateJugadoresRequest;
use App\Repositories\JugadoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JugadoresController extends AppBaseController
{
    /** @var  JugadoresRepository */
    private $jugadoresRepository;

    public function __construct(JugadoresRepository $jugadoresRepo)
    {
        $this->jugadoresRepository = $jugadoresRepo;
    }

    /**
     * Display a listing of the Jugadores.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jugadoresRepository->pushCriteria(new RequestCriteria($request));
        $jugadores = $this->jugadoresRepository->all();

        return view('jugadores.index')
            ->with('jugadores', $jugadores);
    }

    /**
     * Show the form for creating a new Jugadores.
     *
     * @return Response
     */
    public function create()
    {
        $equipo =  ['' => ''] + Equipos::pluck('nombre', 'id')->toArray();
        $posiciones =  ['' => ''] + Posiciones::pluck('nombre', 'id')->toArray();
        return view('jugadores.create',compact('equipo','posiciones'));
    }

    /**
     * Store a newly created Jugadores in storage.
     *
     * @param CreateJugadoresRequest $request
     *
     * @return Response
     */
    public function store(CreateJugadoresRequest $request)
    {
        $input = $request->all();
        $path = public_path('uploads/');
        $file = $request->file('foto');
        $fileName='';
        
        if($file!='') {
        $extension = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $tamanio = $file->getClientSize();
        
        $fileName = base64_encode($originalName) .''.time() . '.' . $extension;
        $file->move($path, $fileName);
        }

        $jugador = new Jugadores();
        $jugador->foto = $fileName;
        $jugador->nombre = $request->nombre;
        $jugador->apellidos = $request->apellidos;
        $jugador->fecha_nacimiento = $request->fecha_nacimiento;
        $jugador->num_camiseta = $request->num_camiseta;
        $jugador->titular = $request->titular;
        $jugador->equipo_id = $request->equipo_id;
        $jugador->posicion_id = $request->posicion_id;
        $jugador->save();

        Flash::success('Jugadores saved successfully.');

        return redirect(route('jugadores.index'));
    }

    /**
     * Display the specified Jugadores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jugadores = $this->jugadoresRepository->findWithoutFail($id);

        if (empty($jugadores)) {
            Flash::error('Jugadores not found');

            return redirect(route('jugadores.index'));
        }

        return view('jugadores.show')->with('jugadores', $jugadores);
    }

    /**
     * Show the form for editing the specified Jugadores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jugadores = $this->jugadoresRepository->findWithoutFail($id);

        if (empty($jugadores)) {
            Flash::error('Jugadores not found');

            return redirect(route('jugadores.index'));
        }

        $equipo =  ['' => ''] + Equipos::pluck('nombre', 'id')->toArray();
        $posiciones =  ['' => ''] + Posiciones::pluck('nombre', 'id')->toArray();


        return view('jugadores.edit',compact('equipo','posiciones'))->with('jugadores', $jugadores);
    }

    /**
     * Update the specified Jugadores in storage.
     *
     * @param  int              $id
     * @param UpdateJugadoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJugadoresRequest $request)
    {
        $input = $request->all();
        $path = public_path('uploads/');
        $file = $request->file('foto');
        $fileName='';
        
        if($file!='') {
        $extension = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $tamanio = $file->getClientSize();
        
        $fileName = base64_encode($originalName) .''.time() . '.' . $extension;
        $file->move($path, $fileName);
        }

        $jugadores = Jugadores::find($id);
        $jugadores->foto = $fileName;
        $jugadores->nombre = $request->nombre;
        $jugadores->apellidos = $request->apellidos;
        $jugadores->fecha_nacimiento = $request->fecha_nacimiento;
        $jugadores->num_camiseta = $request->num_camiseta;
        $jugadores->titular = $request->titular;
        $jugadores->equipo_id = $request->equipo_id;
        $jugadores->posicion_id = $request->posicion_id;
        $jugadores->save();

        Flash::success('Jugadores updated successfully.');

        return redirect(route('jugadores.index'));
    }

    /**
     * Remove the specified Jugadores from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jugadores = $this->jugadoresRepository->findWithoutFail($id);

        if (empty($jugadores)) {
            Flash::error('Jugadores not found');

            return redirect(route('jugadores.index'));
        }

        $this->jugadoresRepository->delete($id);

        Flash::success('Jugadores deleted successfully.');

        return redirect(route('jugadores.index'));
    }
}
