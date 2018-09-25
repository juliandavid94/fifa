@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Estadisticas</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="container" style="margin-bottom: 50px;">
                    <div class="row">
                        <div class="col-md-6">
                            <b><h3>¿Cuántos equipos hay registrados?</h3></b>
                            @if (!empty($equipos))
                            <table class="table">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Bandera</th>
                                    <th>Escudo</th>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $key => $equipo)
                                        <tr>
                                            <td>{{$equipo->nombre}}</td>
                                            <td><img src="{{asset('uploads')}}/{!! $equipo->bandera !!}" style="max-width: 100px; "></td>
                                            <td><img src="{{asset('uploads')}}/{!! $equipo->escudo !!}" style="max-width: 100px; "></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <article><b>Total: </b>{{$e_cantidad}}</article>
                            @else 
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <b><h3>Total de jugadores que participarán en el campeonato</h3></b>
                            @if (!empty($jugadores_c))
                            <table class="table">
                                <thead>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Equipo</th>
                                    <th>Posicion</th>
                                    <th>Numero Camiseta</th>
                                </thead>
                                <tbody>
                                    @foreach ($jugadorJ as $key => $jugador)
                                        <tr>
                                            <td><img src="{{asset('uploads')}}/{!! $jugador->foto !!}" style="max-width: 100px; "></td>
                                            <td>{{$jugador->nombre}}</td>
                                            <td>{{$jugador->apellidos}}</td>
                                            <td>{{$jugador->fecha_nacimiento}}</td>
                                            <td>{{$jugador->equipo->nombre}}</td>
                                            <td>{{$jugador->posicion->nombre}}</td>
                                            <td>{{$jugador->num_camiseta}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <article><b>Total: </b>{{$jugadores_c}}</article>
                            @else 
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <b><h3>Quién es el jugador más joven</h3></b>
                            @if (!empty($jmin))
                            <article><img src="{{asset('uploads')}}/{!! $jmin->foto !!}" style="max-width: 250px; "></article>
                            <article><b>Nombre: </b>{{$jmin->nombre}}</article>
                            <article><b>Apellidos: </b>{{$jmin->apellidos}}</article>
                            <article><b>Fecha de Nacimiento: </b>{{$jmin->fecha_nacimiento}}</article>
                            <article><b>Equipo: </b>{{$jmin->equipo->nombre}}</article>
                            @else 
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <b><h3>Quien es el jugador mas viejo</h3></b>
                            @if (!empty($jmin))
                            <article><img src="{{asset('uploads')}}/{!! $jmax->foto !!}" style="max-width: 250px; "></article>
                            <article><b>Nombre: </b>{{$jmax->nombre}}</article>
                            <article><b>Apellidos: </b>{{$jmax->apellidos}}</article>
                            <article><b>Fecha de Nacimiento: </b>{{$jmax->fecha_nacimiento}}</article>
                            <article><b>Equipo: </b>{{$jmax->equipo->nombre}}</article>
                            @else 
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <b><h3>Cuantos jugadores suplentes hay</h3></b>
                            @if (!empty($jugadoresSup))
                            <table class="table">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Equipo</th>
                                </thead>
                                <tbody>
                                    @foreach ($jugadoresSup as $key => $suplente)
                                        <tr>
                                            <td>{{$suplente->nombre}}</td>
                                            <td>{{$suplente->apellidos}}</td>
                                            <td>{{$suplente->equipo->nombre}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <article><b>Total: </b>{{$jugadoresS}}</article>
                            @else
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <b><h3>Cual de los equipo fue el que mas registró jugadores</h3></b>
                            @if (!empty($jugadoresP))
                            <article><img src="{{asset('uploads')}}/{!! $jugadoresP->bandera !!}" style="max-width: 100px; ">
                                <img src="{{asset('uploads')}}/{!! $jugadoresP->escudo !!}" style="max-width: 100px; "></article>
                            <article><b>Nombre: </b>{{$jugadoresP->nombre}}</article>
                            @else
                            <article>No hay datos para mostrar</article> 
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <b><h3>Técnicos que son de nacionalidad distinta a su equipo</h3></b>
                            @if (!empty($nacionalidad))
                            <table class="table">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha Nacimiento</th>
                                </thead>
                                <tbody>
                                    @foreach ($nacionalidad as $key => $tec)
                                        <tr>
                                            <td>{{$tec->nombre}}</td>
                                            <td>{{$tec->apellidos}}</td>
                                            <td>{{$tec->fecha_nacimiento}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <b><h3>Quien es el técnico mas viejo</h3></b>
                            @if (!empty($tmax))
                            <article><b>Nombre: </b>{{$tmax->nombre}}</article>
                            <article><b>Apellidos: </b>{{$tmax->apellidos}}</article>
                            <article><b>Fecha de Nacimiento: </b>{{$tmax->fecha_nacimiento}}</article>
                            <article><b>Nacionalidad: </b>{{$tmax->nacionalidad->nombre}}</article>
                            <article><b>Equipo: </b>{{$tmax->equipo->nombre}}</article>
                            @else
                            <article>No hay datos para mostrar</article>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <b><h3>Busqueda</h3></b>
                            <table id="busqueda">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Rol</th>
                                    <th>Equipo</th>
                                </thead>
                                <tbody >
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

<script type="text/javascript" src="{{ asset('js/gestionar.js') }}"></script>

