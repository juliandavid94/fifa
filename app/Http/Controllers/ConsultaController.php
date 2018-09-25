<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Jugadores;
use App\Models\Equipos;
use App\Models\Tecnicos;
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipos::get();
        $e_cantidad=$equipos->count();
        $jugadorJ= Jugadores::with('equipo','posicion')->get();
        $jugadores_c = $jugadorJ->count();
        $jmin = $jugadorJ->where('fecha_nacimiento', $jugadorJ->min('fecha_nacimiento'))->first();
        $jmax= $jugadorJ->where('fecha_nacimiento', $jugadorJ->max('fecha_nacimiento'))->first();
        $jugadoresS= $jugadorJ->where('titular', '<>' ,'on')->count();
        $jugadoresSup= $jugadorJ->where('titular', '<>' ,'on');
        $jugadoresP = DB::table('jugadores')
                 ->select('equipos.nombre','equipos.bandera','equipos.escudo','jugadores.equipo_id', DB::raw('count(jugadores.equipo_id) as total'))
                 ->leftJoin('equipos', 'jugadores.equipo_id', '=', 'equipos.id')
                 ->groupBy('jugadores.equipo_id','equipos.nombre','equipos.bandera','equipos.escudo')
                 ->orderBy(DB::raw('count(jugadores.equipo_id)'), 'desc')
                 ->first();
        $nacionalidad = DB::table('tecnico')
            ->leftJoin('equipos', 'tecnico.equipo_id', '=', 'equipos.id')
            ->where('tecnico.nacionalidad_id','=','equipos.nacionalidad_id')
            ->where('tecnico.rol_tecnico_id', 1)
            ->select('tecnico.*')
            ->get();
        $tecnicoA= Tecnicos::with('equipo','nacionalidad')->get();
        $tmax=$tecnicoA->where('fecha_nacimiento', $tecnicoA->max('fecha_nacimiento'))->where('rol_tecnico',1)->first();
        // dd($nacionalidad);
        return view('consultas.index', compact('equipos','e_cantidad','jugadores_c','jugadorJ','jmin','jmax','jugadoresS','jugadoresSup','jugadoresP','nacionalidad','tmax'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
