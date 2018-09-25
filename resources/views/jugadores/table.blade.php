<table class="table table-responsive" id="jugadores-table">
    <thead>
        <tr>
            <th>Foto</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha Nacimiento</th>
        <th>Equipo Id</th>
        <th>Posicion Id</th>
        <th>Num Camiseta</th>
        <th>Titular</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jugadores as $jugadores)
        <tr>
            <td>{!! $jugadores->foto !!}</td>
            <td>{!! $jugadores->nombre !!}</td>
            <td>{!! $jugadores->apellidos !!}</td>
            <td>{!! $jugadores->fecha_nacimiento !!}</td>
            <td>{!! $jugadores->equipo_id !!}</td>
            <td>{!! $jugadores->posicion_id !!}</td>
            <td>{!! $jugadores->num_camiseta !!}</td>
            <td>{!! $jugadores->titular !!}</td>
            <td>
                {!! Form::open(['route' => ['jugadores.destroy', $jugadores->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jugadores.show', [$jugadores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jugadores.edit', [$jugadores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>