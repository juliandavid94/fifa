<table class="table table-responsive" id="tecnicos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha Nacimiento</th>
        <th>Nacionalidad Id</th>
        <th>Rol Tecnico Id</th>
        <th>Equipo Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tecnicos as $tecnicos)
        <tr>
            <td>{!! $tecnicos->nombre !!}</td>
            <td>{!! $tecnicos->apellidos !!}</td>
            <td>{!! $tecnicos->fecha_nacimiento !!}</td>
            <td>{!! $tecnicos->nacionalidad_id !!}</td>
            <td>{!! $tecnicos->rol_tecnico_id !!}</td>
            <td>{!! $tecnicos->equipo_id !!}</td>
            <td>
                {!! Form::open(['route' => ['tecnicos.destroy', $tecnicos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tecnicos.show', [$tecnicos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tecnicos.edit', [$tecnicos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>