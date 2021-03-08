@extends('layouts.app')

@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Utilizadores</a></li>
{{--                <li class="breadcrumb-item"><a href="{{ $users->currentPage() }}">Utilizadoresddd</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page">Detalhes Utilizador</li>
            </ol>
        </nav>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
