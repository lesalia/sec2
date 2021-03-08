
<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('/files/doc.png')}}" alt="User profile picture">

            <h3 class="profile-username text-center"><p>{{$doc->nrDoc}}</p></h3>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <span>Estado : </span> <a class="pull-center">
                        {{ $doc->estado['designacao'] }}
                    </a>
                </li>
                <li class="list-group-item">
                    <a href= {{asset($doc->file)}} target="_blank"> Baixar este documento <i class="fa fa-cloud-download" aria-hidden="true"></i> </a>
                </li>
                <li class="list-group-item">
                    <a href="/download"> Testar Baixar <i class="fa fa-cloud-download" aria-hidden="true"></i> </a>
                </li>
                @if(Auth::user()->nivel>1)
                    @if($doc->estado_id>=0)
                        {!! Form::open(['route' => ['docs.encaminhar'], 'method' => 'post', 'class'=>'pull-left','style'=>'margin-left: 10px']) !!}
                        <input type="hidden" value="{{ $doc->id}}" name="encaminhar" />
                        {!! Form::button('<i class="fa fa-share"></i>  Encaminhar', ['type' => 'submit', 'class' => 'btn btn-link']) !!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['docs.despachar'], 'method' => 'post', 'class'=>'pull-left','style'=>'margin-left: 10px']) !!}
                        <input type="hidden" value="{{ $doc->id}}" name="despachar" />
                        {!! Form::button('<i class="fa fa-upload"></i>  Anexar despacho', ['type' => 'submit', 'class' => 'btn btn-link']) !!}

                        {!! Form::close() !!}
                    @endif
                @endif
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#dados" data-toggle="tab">Detalhes do documento</a></li>
            <li><a href="#outras" data-toggle="tab">Visualizar documento</a></li>
            @if(Auth::user()->nivel>1)
                <li><a href="#historico" data-toggle="tab"> Trajectos do Doc</a></li>
            @endif

        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="dados">
                <fieldset>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group-sm row">
                                <div class="col-sm-6"> Assunto:
                                    <input class="form-control" name="name" type="text" value="{{$doc->assunto}}">
                                </div>
                                <div class="col-sm-6"> Categoria:
                                    <input class="form-control" name="email" type="text" value="{{$doc->categoria}}">
                                </div>
                            </div><br>
                            <div class="form-group-sm row ">
                                <div class="col-sm-6"> Data de entrada:
                                    <input class="form-control" type="text" value="{{ $doc->created_at->format('d - M - Y')}}">
                                </div>
                                <div class="col-sm-6">Periodo de entrada:
                                    <input class="form-control" type="text" value="{{ $doc->created_at->format('H: i')}}">
                                </div>
                            </div>
                            <br>

                            <div class="form-group-sm row ">
                                <div class="col-sm-6"> Remetente:
                                    <input class="form-control" type="text" value="{{ $doc->remetente}}">
                                </div>
                                <div class="col-sm-6">E-mail do remetente:
                                    <input class="form-control" type="text" value="{{ $doc->email}}">
                                </div>
                            </div>
                            <br>
                            <div class="form-group-sm row ">
                                <div class="col-sm-6"> Ultima alteracao:
                                    <input class="form-control" type="text" value="{{$doc->updated_at->format('d - M - Y / H:i')}}">
                                </div>
                                <div class="col-sm-6">Inserido por:
                                    <input class="form-control" type="text" value="{{$doc->user['name']}}">
                                </div>
                            </div> <br>
                            <div class="form-group-sm row ">
                                <div class="col-sm-6"> Recebido de:
                                    <input class="form-control" type="text" value="{{$doc->origem}}">
                                </div>
                                <div class="col-sm-6"> Detalhes adicionais:
                                    <input class="form-control" type="text" value="{{ $doc->descricao}}">
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="tab-pane" id="outras">
                <div class="col-sm-12">
                    <iframe src="{{url($doc->file)}}" style="height:400px; width:100%" frameborder="no"></iframe>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="historico">
                <div class="col-sm-12">
                   @include('destinos.table2')
                </div>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
