<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use App\Models\Nacionalidades;
use App\Models\Rol_tecnico;
use App\Models\Equipos;
use App\Http\Requests\CreateTecnicosRequest;
use App\Http\Requests\UpdateTecnicosRequest;
use App\Repositories\TecnicosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TecnicosController extends AppBaseController
{
    /** @var  TecnicosRepository */
    private $tecnicosRepository;

    public function __construct(TecnicosRepository $tecnicosRepo)
    {
        $this->tecnicosRepository = $tecnicosRepo;
    }

    /**
     * Display a listing of the Tecnicos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tecnicosRepository->pushCriteria(new RequestCriteria($request));
        $tecnicos = $this->tecnicosRepository->all();

        return view('tecnicos.index')
            ->with('tecnicos', $tecnicos);
    }

    /**
     * Show the form for creating a new Tecnicos.
     *
     * @return Response
     */
    public function create()
    {
        $equipo =  ['' => ''] + Equipos::pluck('nombre', 'id')->toArray();
        $nacionalidad =  ['' => ''] + Nacionalidades::pluck('nombre', 'id')->toArray();
        $rol_tecnico =  ['' => ''] + Rol_tecnico::pluck('nombre', 'id')->toArray();
        return view('tecnicos.create', compact('equipo','nacionalidad','rol_tecnico'));
    }

    /**
     * Store a newly created Tecnicos in storage.
     *
     * @param CreateTecnicosRequest $request
     *
     * @return Response
     */
    public function store(CreateTecnicosRequest $request)
    {
        $input = $request->all();

        $tecnicos = $this->tecnicosRepository->create($input);

        Flash::success('Tecnicos saved successfully.');

        return redirect(route('tecnicos.index'));
    }

    /**
     * Display the specified Tecnicos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tecnicos = $this->tecnicosRepository->findWithoutFail($id);

        if (empty($tecnicos)) {
            Flash::error('Tecnicos not found');

            return redirect(route('tecnicos.index'));
        }

        return view('tecnicos.show')->with('tecnicos', $tecnicos);
    }

    /**
     * Show the form for editing the specified Tecnicos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tecnicos = $this->tecnicosRepository->findWithoutFail($id);

        if (empty($tecnicos)) {
            Flash::error('Tecnicos not found');

            return redirect(route('tecnicos.index'));
        }

        $equipo =  ['' => ''] + Equipos::pluck('nombre', 'id')->toArray();
        $nacionalidad =  ['' => ''] + Nacionalidades::pluck('nombre', 'id')->toArray();
        $rol_tecnico =  ['' => ''] + Rol_tecnico::pluck('nombre', 'id')->toArray();

        return view('tecnicos.edit', compact('equipo','nacionalidad','rol_tecnico'))->with('tecnicos', $tecnicos);
    }

    /**
     * Update the specified Tecnicos in storage.
     *
     * @param  int              $id
     * @param UpdateTecnicosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTecnicosRequest $request)
    {
        $tecnicos = $this->tecnicosRepository->findWithoutFail($id);

        if (empty($tecnicos)) {
            Flash::error('Tecnicos not found');

            return redirect(route('tecnicos.index'));
        }

        $tecnicos = $this->tecnicosRepository->update($request->all(), $id);

        Flash::success('Tecnicos updated successfully.');

        return redirect(route('tecnicos.index'));
    }

    /**
     * Remove the specified Tecnicos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tecnicos = $this->tecnicosRepository->findWithoutFail($id);

        if (empty($tecnicos)) {
            Flash::error('Tecnicos not found');

            return redirect(route('tecnicos.index'));
        }

        $this->tecnicosRepository->delete($id);

        Flash::success('Tecnicos deleted successfully.');

        return redirect(route('tecnicos.index'));
    }
}
