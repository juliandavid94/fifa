@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nacionalidades
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nacionalidades, ['route' => ['nacionalidades.update', $nacionalidades->id], 'method' => 'patch']) !!}

                        @include('nacionalidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection