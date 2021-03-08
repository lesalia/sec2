@extends('layouts.app')

@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Relatorio</li>
            </ol>
        </nav>
    </section>
    <div class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <div class="widget-user-image">
                                <img class="img" src="{{asset('/files/doc.png')}}" alt="doc-info2">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Documentos</h3>
                            <h5 class="widget-user-desc">Resumo das actividades</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">Total de Documentos registados <span class="pull-right badge bg-blue">0{{ $nrdocs }}</span></a></li>
                                <li><a href="#">Documentos despachados <span class="pull-right badge bg-green">0{{ $docs1 }}</span></a></li>
                                <li><a href="#">Documentos Pendentes <span class="pull-right badge bg-yellow">0{{ $docs0 }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- /.col -->
                <div class="col-md-6" >
                    <!-- Widget: user widget style 1 -->
                    <div class="col-md-2">

                    </div>
                        <img class="img" src="{{asset('/files/logo_ibe.png')}}" width="230" alt="doc-info">
                    <!-- /.widget-user -->
                </div>
            </div>
            <!-- /.row -->
        </section>
{{--        assunto formulario--}}
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-11 offset-md-2">
                    <form action="{{ url('relatorios.documentos') }}" method="Get" accept-charset="utf-8">
                        @csrf
                        <div class="contact-form">
                            <div class="form-group col-xs-4">
{{--                                @switch( Auth::user()->nivel)--}}
{{--                                    @case(0)--}}
{{--                                    <select name="tipo" class="form-control" style="visibility: hidden">--}}
{{--                                        <option value="1"> Documento</option>--}}
{{--                                    </select>--}}
{{--                                    @break--}}
{{--                                    @case(1)--}}
{{--                                    <label for="seeAnotherField"> Tipo de Relatorio:</label>--}}
{{--                                    <select name="tipo" class="form-control">--}}
{{--                                        <option value="2"> Controle de Acesso</option>--}}
{{--                                        <option value="3"> Ocorrencias</option>--}}
{{--                                    </select>--}}
{{--                                    @break--}}
{{--                                    @case(2)--}}
                                    <label for="seeAnotherField"> Tipo de Relatorio:</label>
                                    <select name="tipo" class="form-control">
                                        <option value="1"> Documento</option>
                                    </select>
{{--                                    @break--}}
{{--                                @endswitch--}}
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="seeAnotherField"> A partir de:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" name="datainic" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="seeAnotherField"> Ate:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="datetime-local" name="datafim" class="form-control pull-right" value="2020-04-13T23:00">
                                </div>
                            </div><br>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-link">Cinfirmar dados para Relatorio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
