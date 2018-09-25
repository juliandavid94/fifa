<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $equipos->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $equipos->nombre !!}</p>
</div>

<!-- Bandera Field -->
<div class="form-group">
    {!! Form::label('bandera', 'Bandera:') !!}
    <img src="{{asset('uploads')}}/{!! $equipos->bandera !!}" style="max-width: 250px; ">
</div>

<!-- Escudo Field -->
<div class="form-group">
    {!! Form::label('escudo', 'Escudo:') !!}
    <img src="{{asset('uploads')}}/{!! $equipos->escudo !!}" style="max-width: 250px; ">

</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $equipos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $equipos->updated_at !!}</p>
</div>

