<table class="table table-responsive" id="rolTecnicos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rolTecnicos as $rolTecnico)
        <tr>
            <td>{!! $rolTecnico->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['rolTecnicos.destroy', $rolTecnico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rolTecnicos.show', [$rolTecnico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rolTecnicos.edit', [$rolTecnico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>