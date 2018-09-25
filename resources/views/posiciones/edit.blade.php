@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Posiciones
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($posiciones, ['route' => ['posiciones.update', $posiciones->id], 'method' => 'patch']) !!}

                        @include('posiciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection