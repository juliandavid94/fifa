<table class="table table-responsive" id="equipos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Bandera</th>
        <th>Escudo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipos as $equipos)
        <tr>
            <td>{!! $equipos->nombre !!}</td>
            <td>{!! $equipos->bandera !!}</td>
            <td>{!! $equipos->escudo !!}</td>
            <td>
                {!! Form::open(['route' => ['equipos.destroy', $equipos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('equipos.show', [$equipos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('equipos.edit', [$equipos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>