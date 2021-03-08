@extends('layouts.app')

@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Pagina Inicial</a></li>
                <li class="breadcrumb-item active" aria-current="page">Relatorio de Documentos</li>
            </ol>
        </nav>
    </section>
    <!-- Main content -->
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

                <address>
                    <div class="box-body box-profile">
                        <img class="profile img-responsive" src="{{asset('/files/logo_unirovuma.png')}}" width="120" alt="User profile picture">
                    </div>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">

            </div>
            <div class="col-sm-4 invoice-col" style="color: #0b8b33">
                Endereco, Montepuez, Ncoripo<br>
                <b>Email:</b>  cabodelgado@ur.com <br>
                <b>Extraido por: </b>{{ auth()->user()->name }}<br>
                <b>A partir de:</b> {{ $data['datainic'] }}<br>
                <b>Ate:     </b> {{ $data['datafim'] }}<br>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nrdoc</th>
                        <th>Referencia</th>
                        <th>Tipo de documento</th>
                        <th>Data entrada</th>
                        <th>Remetente</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lista as $doc)
                    <tr>
                        <td> <i class="fa fa-file-word-o"> </i> {{ $doc->nrDoc }}</td>
                        <td> {{ $doc->referencia }}</td>
                        <td> {{ $doc->categoria }}</td>
                        <td>{{ ($doc->created_at)->format('d-M-Y') }}</td>
                        <td>{{ $doc->origem }}</td>
                        <td>@if($doc->estado==1)
                                <i class="fa fa-check-square text-success"> Despachado</i>
                            @else
                                <i class="fa fa-warning text-yellow"> Em Analise</i>
                            @endif</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">

            </div>
            <!-- /.col -->
            <div class="col-xs-6">
{{--                <p class="lead">Amount Due 2/22/2014</p>--}}

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Recebidos:</th>
                            <td>0{{ $data['total'] }}</td>
                        </tr>
                        <tr>
                            <th>Despachados</th>
                            <td>0{{ $data['despachado'] }}</td>
                        </tr>
                        <tr>
                            <th>Em analise:</th>
                            <td>0{{ $data['analise'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a onclick="myFunction()" href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
            </div>
        </div>
        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </section>
    <!-- /.content -->
@endsection

