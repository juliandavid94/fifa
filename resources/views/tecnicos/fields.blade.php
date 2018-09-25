<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacionalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacionalidad_id', 'Nacionalidad Id:') !!}
    {!!Form::select('nacionalidad_id', $nacionalidad,null,['class'=>'form-control', 'required'])!!}
</div>

<!-- Rol Tecnico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_tecnico_id', 'Rol Tecnico Id:') !!}
    {!!Form::select('rol_tecnico_id', $rol_tecnico,null,['class'=>'form-control', 'required'])!!}
</div>

<!-- Equipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_id', 'Equipo Id:') !!}
    {!!Form::select('equipo_id', $equipo,null,['class'=>'form-control', 'required'])!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tecnicos.index') !!}" class="btn btn-default">Cancel</a>
</div>
