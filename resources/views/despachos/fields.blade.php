<div class="col-sm-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('/files/doc.png')}}" alt="User profile picture">
            <h3 class="profile-username text-center"><p>Doc. Nr: {{$dadosdoc['user_id'] ?? ''}}</p></h3>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!--  Estes campos recebe da pagina documento e sao passados aqui como parameros -->
{!! Form::hidden('doc_id', $dadosdoc['doc'] ?? '', ['class' => 'form-control']) !!}
{!! Form::hidden('user_id', $dadosdoc['user_id'] ?? '', ['class' => 'form-control']) !!}
<!-- Destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'Anexar Despacho:') !!}
    {!! Form::file('file', null, ['class' => 'form-control', 'require']) !!}
</div>
<!-- Obs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obs', 'Observações:') !!}
    {!! Form::text('obs', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-9">
    {!! Form::submit('Salvar', ['class' => 'btn btn-link']) !!}
</div>
