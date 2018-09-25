<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jugadores->id !!}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <img src="{{asset('uploads')}}/{!! $jugadores->foto !!}" style="max-width: 250px; ">
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $jugadores->nombre !!}</p>
</div>

<!-- Apellidos Field -->
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{!! $jugadores->apellidos !!}</p>
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    <p>{!! $jugadores->fecha_nacimiento !!}</p>
</div>

<!-- Equipo Id Field -->
<div class="form-group">
    {!! Form::label('equipo_id', 'Equipo Id:') !!}
    <p>{!! $jugadores->equipo_id !!}</p>
</div>

<!-- Posicion Id Field -->
<div class="form-group">
    {!! Form::label('posicion_id', 'Posicion Id:') !!}
    <p>{!! $jugadores->posicion_id !!}</p>
</div>

<!-- Num Camiseta Field -->
<div class="form-group">
    {!! Form::label('num_camiseta', 'Num Camiseta:') !!}
    <p>{!! $jugadores->num_camiseta !!}</p>
</div>

<!-- Titular Field -->
<div class="form-group">
    {!! Form::label('titular', 'Titular:') !!}
    <p>{!! $jugadores->titular !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jugadores->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jugadores->updated_at !!}</p>
</div>

