<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Nacionalidades;
use App\Http\Requests\CreateEquiposRequest;
use App\Http\Requests\UpdateEquiposRequest;
use App\Repositories\EquiposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EquiposController extends AppBaseController
{
    /** @var  EquiposRepository */
    private $equiposRepository;

    public function __construct(EquiposRepository $equiposRepo)
    {
        $this->equiposRepository = $equiposRepo;
    }

    /**
     * Display a listing of the Equipos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->equiposRepository->pushCriteria(new RequestCriteria($request));
        $equipos = $this->equiposRepository->all();

        return view('equipos.index')
            ->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new Equipos.
     *
     * @return Response
     */
    public function create()
    {
        $nacionalidad =  ['' => ''] + Nacionalidades::pluck('nombre', 'id')->toArray();
        return view('equipos.create', compact('nacionalidad'));
    }

    /**
     * Store a newly created Equipos in storage.
     *
     * @param CreateEquiposRequest $request
     *
     * @return Response
     */
    public function store(CreateEquiposRequest $request)
    {
        $input = $request->all();
        $path = public_path('uploads/');
        $file = $request->file('bandera');
        $fileName='';
        
        if($file!='') {
        $extension = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $tamanio = $file->getClientSize();
        
        $fileName = base64_encode($originalName) .''.time() . '.' . $extension;
        $file->move($path, $fileName);
        }
        
        $file2 = $request->file('escudo');
        $fileName2='';

        if($file2!='') {
        $extension2 = $file2->getClientOriginalExtension();
        $originalName2 = $file2->getClientOriginalName();
        $tamanio2 = $file2->getClientSize();
        
        $fileName2 = base64_encode($originalName2) .''. time() . '.' . $extension2;
        $file2->move($path, $fileName2);
        }
        $equipo = new Equipos();
        $equipo->nombre = $request->nombre;
        // $equipo->nombre_original = $originalName; $request->input('ticketCodigo').'/'.$fileName;
        $equipo->bandera = $fileName;
        $equipo->escudo = $fileName2;
        $equipo->nacionalidad_id = $request->nacionalidad_id;
        $equipo->save();
        

        Flash::success('Equipos saved successfully.');

        return redirect(route('equipos.index'));
    }

    /**
     * Display the specified Equipos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipos = $this->equiposRepository->findWithoutFail($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        return view('equipos.show')->with('equipos', $equipos);
    }

    /**
     * Show the form for editing the specified Equipos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipos = $this->equiposRepository->findWithoutFail($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }
        $nacionalidad =  ['' => ''] + Nacionalidades::pluck('nombre', 'id')->toArray();
        return view('equipos.edit', compact('nacionalidad'))->with('equipos', $equipos);
    }

    /**
     * Update the specified Equipos in storage.
     *
     * @param  int              $id
     * @param UpdateEquiposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquiposRequest $request)
    {
        $input = $request->all();
        $path = public_path('uploads/');
        $file = $request->file('bandera');
        $fileName='';
        
        if($file!='') {
        $extension = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $tamanio = $file->getClientSize();
        
        $fileName = base64_encode($originalName) .''.time() . '.' . $extension;
        $file->move($path, $fileName);
        }
        
        $file2 = $request->file('escudo');
        $fileName2='';

        if($file2!='') {
        $extension2 = $file2->getClientOriginalExtension();
        $originalName2 = $file2->getClientOriginalName();
        $tamanio2 = $file2->getClientSize();
        
        $fileName2 = base64_encode($originalName2) .''. time() . '.' . $extension2;
        $file2->move($path, $fileName2);
        }

        $equipo = Equipos::find($id);
        $equipo->nombre = $request->nombre;
        // $equipo->nombre_original = $originalName; $request->input('ticketCodigo').'/'.$fileName;
        $equipo->bandera = $fileName;
        $equipo->escudo = $fileName2;
        $equipo->nacionalidad_id = $request->nacionalidad_id;
        $equipo->save();

        Flash::success('Equipos updated successfully.');

        return redirect(route('equipos.index'));
    }

    /**
     * Remove the specified Equipos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipos = $this->equiposRepository->findWithoutFail($id);

        if (empty($equipos)) {
            Flash::error('Equipos not found');

            return redirect(route('equipos.index'));
        }

        $this->equiposRepository->delete($id);

        Flash::success('Equipos deleted successfully.');

        return redirect(route('equipos.index'));
    }
}
