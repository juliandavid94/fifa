<!-- Foto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('foto', 'Foto:') !!}
    <div class="form-group">
   <button type="button" class="btn btn-default" onclick="javascript:$('#foto').click()"><i class="la la-upload"></i> Adjuntar Imagen </button>
   <span id="nombreArchivo1"></span>
   <input onchange="javascript:$('#nombreArchivo1').html($(this).val())" type="file" name="foto" id="foto" required style="display: none;">
</div>
</div>

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

<!-- Equipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_id', 'Equipo Id:') !!}
    {!!Form::select('equipo_id', $equipo,null,['class'=>'form-control', 'required'])!!}
</div>

<!-- Posicion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posicion_id', 'Posicion Id:') !!}
    {!!Form::select('posicion_id', $posiciones,null,['class'=>'form-control', 'required'])!!}
</div>

<!-- Num Camiseta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_camiseta', 'Num Camiseta:') !!}
    {!! Form::number('num_camiseta', null, ['class' => 'form-control']) !!}
</div>

<!-- Titular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titular', 'Titular:') !!}
    {!! Form::checkbox('titular', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jugadores.index') !!}" class="btn btn-default">Cancel</a>
</div>
