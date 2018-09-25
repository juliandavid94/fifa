<table class="table table-responsive" id="nacionalidades-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nacionalidades as $nacionalidades)
        <tr>
            <td>{!! $nacionalidades->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['nacionalidades.destroy', $nacionalidades->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nacionalidades.show', [$nacionalidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nacionalidades.edit', [$nacionalidades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>