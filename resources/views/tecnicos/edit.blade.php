@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tecnicos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tecnicos, ['route' => ['tecnicos.update', $tecnicos->id], 'method' => 'patch']) !!}

                        @include('tecnicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection