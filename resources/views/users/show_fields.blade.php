
<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('files/defaultuser.png')}}" alt="User profile picture">
            <h3 class="profile-username text-center"><p>Nr de Utilizador: 00{{$user->id}}</p></h3>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Estado : </b> <a class="pull-right">
                        @if($user->estado==1)
                            <i class="fa fa-check-square text-success"> Activo</i>
                        @else
                            <i class="fa fa-warning text-yellow"> Bloqueado</i>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Cadastro em:</b> <a class="pull-right">{!! $user->created_at->format('d/ M / Y') !!}</a>
                </li>
                @if($user->estado==1)
                    {!! Form::open(['route' => ['users.bloquear'], 'method' => 'post', 'class'=>'pull-left','style'=>'margin-left: 10px']) !!}
                    <input type="hidden" value="{{ $user->id}}" name="atender" />
                    {!! Form::button('<i class="fa fa-remove text-red"> Bloquear utilizador</i>  ', ['type' => 'submit', 'class' => 'btn btn-link', 'onclick' => "return confirm('Bloquear este utilizador ?')"]) !!}

                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['route' => ['users.bloquear'], 'method' => 'post', 'class'=>'pull-left','style'=>'margin-left: 10px']) !!}
                    <input type="hidden" value="{{ $user->id}}" name="atender" />
                    {!! Form::button('<i class="fa fa-remove text-red"> Desbloquear utilizador</i>  ', ['type' => 'submit', 'class' => 'btn btn-link', 'onclick' => "return confirm('Desbloquear este utilizador ?')"]) !!}

                    {!! Form::close() !!}
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
        <div class="tab-content">
            <fieldset>
                <legend>Detalhes do Utilizador</legend>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group-sm row">
                            <div class="col-sm-6"> Nome de utilizador:
                                <input class="form-control" name="name" type="text" value="{{$user->username}}">
                            </div>
                            <div class="col-sm-6"> Nome Completo:
                                <input class="form-control" name="email" type="email" value="{{$user->name}}">
                            </div>
                        </div><br>
                        <div class="form-group-sm row ">
                            <div class="col-sm-6"> E-mail:
                                <input class="form-control" type="text" name="telefonecasa" value="{{$user->email}}">
                            </div>
                            <div class="col-sm-6"> Criado em:
                                <input class="form-control" type="text" name="telefonecasa" value="{!! $user->created_at->format('d/ M / Y') !!}">
                            </div>
                        </div><br>

                        <div class="form-group-sm row ">
                            <div class="col-sm-6"> Nivel de acesso:
                                @switch($user->nivel)
                                    @case(0)
                                    <input class="form-control" type="text" name="telefonecasa" value="Recepcionista">
                                    @break
                                    @case(1)
                                    <input class="form-control" type="text" name="telefonecasa" value="Seguranxa">
                                    @break
                                    @case(2)
                                    <input class="form-control" type="text" name="telefonecasa" value="Admnistrador">
                                    @break
                                @endswitch
                            </div>
                            <div class="col-sm-6"> Actualizado em:
                                <input class="form-control" type="text" name="telefonecasa" value="{!! $user->created_at->format('d/ M / Y') !!}">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- /.tab-pane -->            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
