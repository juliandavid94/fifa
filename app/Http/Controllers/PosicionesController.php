<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePosicionesRequest;
use App\Http\Requests\UpdatePosicionesRequest;
use App\Repositories\PosicionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PosicionesController extends AppBaseController
{
    /** @var  PosicionesRepository */
    private $posicionesRepository;

    public function __construct(PosicionesRepository $posicionesRepo)
    {
        $this->posicionesRepository = $posicionesRepo;
    }

    /**
     * Display a listing of the Posiciones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->posicionesRepository->pushCriteria(new RequestCriteria($request));
        $posiciones = $this->posicionesRepository->all();

        return view('posiciones.index')
            ->with('posiciones', $posiciones);
    }

    /**
     * Show the form for creating a new Posiciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('posiciones.create');
    }

    /**
     * Store a newly created Posiciones in storage.
     *
     * @param CreatePosicionesRequest $request
     *
     * @return Response
     */
    public function store(CreatePosicionesRequest $request)
    {
        $input = $request->all();

        $posiciones = $this->posicionesRepository->create($input);

        Flash::success('Posiciones saved successfully.');

        return redirect(route('posiciones.index'));
    }

    /**
     * Display the specified Posiciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $posiciones = $this->posicionesRepository->findWithoutFail($id);

        if (empty($posiciones)) {
            Flash::error('Posiciones not found');

            return redirect(route('posiciones.index'));
        }

        return view('posiciones.show')->with('posiciones', $posiciones);
    }

    /**
     * Show the form for editing the specified Posiciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $posiciones = $this->posicionesRepository->findWithoutFail($id);

        if (empty($posiciones)) {
            Flash::error('Posiciones not found');

            return redirect(route('posiciones.index'));
        }

        return view('posiciones.edit')->with('posiciones', $posiciones);
    }

    /**
     * Update the specified Posiciones in storage.
     *
     * @param  int              $id
     * @param UpdatePosicionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePosicionesRequest $request)
    {
        $posiciones = $this->posicionesRepository->findWithoutFail($id);

        if (empty($posiciones)) {
            Flash::error('Posiciones not found');

            return redirect(route('posiciones.index'));
        }

        $posiciones = $this->posicionesRepository->update($request->all(), $id);

        Flash::success('Posiciones updated successfully.');

        return redirect(route('posiciones.index'));
    }

    /**
     * Remove the specified Posiciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $posiciones = $this->posicionesRepository->findWithoutFail($id);

        if (empty($posiciones)) {
            Flash::error('Posiciones not found');

            return redirect(route('posiciones.index'));
        }

        $this->posicionesRepository->delete($id);

        Flash::success('Posiciones deleted successfully.');

        return redirect(route('posiciones.index'));
    }
}
