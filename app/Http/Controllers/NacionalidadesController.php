<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNacionalidadesRequest;
use App\Http\Requests\UpdateNacionalidadesRequest;
use App\Repositories\NacionalidadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NacionalidadesController extends AppBaseController
{
    /** @var  NacionalidadesRepository */
    private $nacionalidadesRepository;

    public function __construct(NacionalidadesRepository $nacionalidadesRepo)
    {
        $this->nacionalidadesRepository = $nacionalidadesRepo;
    }

    /**
     * Display a listing of the Nacionalidades.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nacionalidadesRepository->pushCriteria(new RequestCriteria($request));
        $nacionalidades = $this->nacionalidadesRepository->all();

        return view('nacionalidades.index')
            ->with('nacionalidades', $nacionalidades);
    }

    /**
     * Show the form for creating a new Nacionalidades.
     *
     * @return Response
     */
    public function create()
    {
        return view('nacionalidades.create');
    }

    /**
     * Store a newly created Nacionalidades in storage.
     *
     * @param CreateNacionalidadesRequest $request
     *
     * @return Response
     */
    public function store(CreateNacionalidadesRequest $request)
    {
        $input = $request->all();

        $nacionalidades = $this->nacionalidadesRepository->create($input);

        Flash::success('Nacionalidades saved successfully.');

        return redirect(route('nacionalidades.index'));
    }

    /**
     * Display the specified Nacionalidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nacionalidades = $this->nacionalidadesRepository->findWithoutFail($id);

        if (empty($nacionalidades)) {
            Flash::error('Nacionalidades not found');

            return redirect(route('nacionalidades.index'));
        }

        return view('nacionalidades.show')->with('nacionalidades', $nacionalidades);
    }

    /**
     * Show the form for editing the specified Nacionalidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nacionalidades = $this->nacionalidadesRepository->findWithoutFail($id);

        if (empty($nacionalidades)) {
            Flash::error('Nacionalidades not found');

            return redirect(route('nacionalidades.index'));
        }

        return view('nacionalidades.edit')->with('nacionalidades', $nacionalidades);
    }

    /**
     * Update the specified Nacionalidades in storage.
     *
     * @param  int              $id
     * @param UpdateNacionalidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNacionalidadesRequest $request)
    {
        $nacionalidades = $this->nacionalidadesRepository->findWithoutFail($id);

        if (empty($nacionalidades)) {
            Flash::error('Nacionalidades not found');

            return redirect(route('nacionalidades.index'));
        }

        $nacionalidades = $this->nacionalidadesRepository->update($request->all(), $id);

        Flash::success('Nacionalidades updated successfully.');

        return redirect(route('nacionalidades.index'));
    }

    /**
     * Remove the specified Nacionalidades from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nacionalidades = $this->nacionalidadesRepository->findWithoutFail($id);

        if (empty($nacionalidades)) {
            Flash::error('Nacionalidades not found');

            return redirect(route('nacionalidades.index'));
        }

        $this->nacionalidadesRepository->delete($id);

        Flash::success('Nacionalidades deleted successfully.');

        return redirect(route('nacionalidades.index'));
    }
}
