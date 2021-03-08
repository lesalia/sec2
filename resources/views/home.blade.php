@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"> / Pagina Inicial</li>
                </ol>
            </nav>
            <a href=""></a>
            <div  class="col-md-10" align="center">
                <img src="{{asset('/files/logo_ibe.png')}}" width="400" class="img-responsive" alt="cmf"/> <hr>
                <div class="callout callout-info">
                    <h2 class="panel-content"> Instituto de Bolsa de Estudo (IBE)</h2>
                    <span class="h4">Gerenciamento de diversas atividades correlacionadas a Secretaria do IBE, compreendendo desde a gestão de documentos atendimento online de utentes que estejam distantes do local Geográfico da Instituição </span>
                </div>

            </div>
        </section>
    </div>
    <div class="row">
        <!-- GetButton.io widget -->
        <a href="https://wa.me/258847213989?text=Bem%20vindo(a)%20ao%20CEAD.%20Em%20que%20podemos%20ajudar?"
        </a>
    </div>
{{--    Modal para Documentos --}}
    <div class="modal fade" id="AddDocumentoModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel"> Registar um novo documento</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'docs.store', 'enctype' => 'multipart/form-data']) !!}

                            @include('docs.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="text-red pull-left">*</span> <span class="pull-left"> Campos Obrigatorios</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
