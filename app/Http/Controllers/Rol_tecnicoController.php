<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRol_tecnicoRequest;
use App\Http\Requests\UpdateRol_tecnicoRequest;
use App\Repositories\Rol_tecnicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Rol_tecnicoController extends AppBaseController
{
    /** @var  Rol_tecnicoRepository */
    private $rolTecnicoRepository;

    public function __construct(Rol_tecnicoRepository $rolTecnicoRepo)
    {
        $this->rolTecnicoRepository = $rolTecnicoRepo;
    }

    /**
     * Display a listing of the Rol_tecnico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rolTecnicoRepository->pushCriteria(new RequestCriteria($request));
        $rolTecnicos = $this->rolTecnicoRepository->all();

        return view('rol_tecnicos.index')
            ->with('rolTecnicos', $rolTecnicos);
    }

    /**
     * Show the form for creating a new Rol_tecnico.
     *
     * @return Response
     */
    public function create()
    {
        return view('rol_tecnicos.create');
    }

    /**
     * Store a newly created Rol_tecnico in storage.
     *
     * @param CreateRol_tecnicoRequest $request
     *
     * @return Response
     */
    public function store(CreateRol_tecnicoRequest $request)
    {
        $input = $request->all();

        $rolTecnico = $this->rolTecnicoRepository->create($input);

        Flash::success('Rol Tecnico saved successfully.');

        return redirect(route('rolTecnicos.index'));
    }

    /**
     * Display the specified Rol_tecnico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rolTecnico = $this->rolTecnicoRepository->findWithoutFail($id);

        if (empty($rolTecnico)) {
            Flash::error('Rol Tecnico not found');

            return redirect(route('rolTecnicos.index'));
        }

        return view('rol_tecnicos.show')->with('rolTecnico', $rolTecnico);
    }

    /**
     * Show the form for editing the specified Rol_tecnico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rolTecnico = $this->rolTecnicoRepository->findWithoutFail($id);

        if (empty($rolTecnico)) {
            Flash::error('Rol Tecnico not found');

            return redirect(route('rolTecnicos.index'));
        }

        return view('rol_tecnicos.edit')->with('rolTecnico', $rolTecnico);
    }

    /**
     * Update the specified Rol_tecnico in storage.
     *
     * @param  int              $id
     * @param UpdateRol_tecnicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRol_tecnicoRequest $request)
    {
        $rolTecnico = $this->rolTecnicoRepository->findWithoutFail($id);

        if (empty($rolTecnico)) {
            Flash::error('Rol Tecnico not found');

            return redirect(route('rolTecnicos.index'));
        }

        $rolTecnico = $this->rolTecnicoRepository->update($request->all(), $id);

        Flash::success('Rol Tecnico updated successfully.');

        return redirect(route('rolTecnicos.index'));
    }

    /**
     * Remove the specified Rol_tecnico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rolTecnico = $this->rolTecnicoRepository->findWithoutFail($id);

        if (empty($rolTecnico)) {
            Flash::error('Rol Tecnico not found');

            return redirect(route('rolTecnicos.index'));
        }

        $this->rolTecnicoRepository->delete($id);

        Flash::success('Rol Tecnico deleted successfully.');

        return redirect(route('rolTecnicos.index'));
    }
}
