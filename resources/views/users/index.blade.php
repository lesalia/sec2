@extends('layouts.app')

@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Utilizadores</a></li>
            </ol>
        </nav>
        <h1 class="pull-right">
            <a class="btn btn-link pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}"><i class="fa fa-plus"> Adicionar</i></a></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

