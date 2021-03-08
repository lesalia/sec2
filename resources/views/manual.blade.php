@extends('layouts.app')

@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Manual de utilizador</li>
            </ol>
        </nav>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Manual de Utilizador</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            O que devo fazer para efectuar o cadastro?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        <p>
                                            O estudante deverá comparecer ao campus ofertante do curso para o qual foi convocado, no prazo estipulado na convocação, para apresentar original e cópia da documentação de matrícula que está relacionada no Edital.
                                            Atualmente, os documentos básicos para matrícula são:
                                        </p>
                                        <ol>
                                            <li> Deve ter um email Valido;</li>
                                            <li> Apos o cadastro recebera um email de confirmacao;</li>
                                            <li> Apos a submissao dos documentos devera receber um email de confirmacao;</li>
                                            <li> Duas fotos 3x4 idênticas e recentes (não precisam ser datadas);</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>

@endsection
