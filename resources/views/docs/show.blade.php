@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="row">
            <section class="content-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('docs.index') }}">Documentos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes Documento</li>
                    </ol>
                </nav>
            </section>
        </div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('docs.show_fields')
{{--                    <a href="{{ route('docs.index') }}" class="btn btn-default"><i class="fa fa-reply"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
