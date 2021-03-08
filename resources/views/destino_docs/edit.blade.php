@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Destino Doc
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($destinoDoc, ['route' => ['destinoDocs.update', $destinoDoc->id], 'method' => 'patch']) !!}

                        @include('destino_docs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection