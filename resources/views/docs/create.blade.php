@extends('layouts.app')

@section('content')
    <section class="content-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('docs.index') }}">Documentos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registar Documento</li>
                </ol>
            </nav>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'docs.store', 'enctype' => 'multipart/form-data']) !!}
                        @include('docs.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
