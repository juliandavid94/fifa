<table class="table table-responsive" id="posiciones-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posiciones as $posiciones)
        <tr>
            <td>{!! $posiciones->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['posiciones.destroy', $posiciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('posiciones.show', [$posiciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('posiciones.edit', [$posiciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>