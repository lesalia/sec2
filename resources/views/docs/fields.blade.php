<div class="col-sm-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('/files/doc.png')}}" alt="User profile picture">
            <h3 class="profile-username text-center"><p>Documento</p></h3>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Remetente Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('remetente') ? ' has-error' : '' }}">
    {!! Form::label('remetente', 'Remetente:') !!}
    {!! Form::text('remetente', null, ['class' => 'form-control', 'placeholder'=>'Nome completo']) !!}
</div>

<!-- email Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<!-- Referencia Field -->
<div class="form-group col-sm-4">
    {!! Form::label('referencia', 'Referência (opcional):') !!}
    {!! Form::text('referencia', null, ['class' => 'form-control', 'placeholder'=>'Ex: Nr/cod/dept./2020']) !!}
</div>

<!-- categoria Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('categoria') ? ' has-error' : '' }}">
    <label for="seeAnotherField"> Tipo de documento:</label>
    <select name="categoria" class="form-control">
        <option selected="selected" value="{{$docs->categoria ?? ''}}"> Alterar o tipo </option>
        <option value="Interno">Interno (Funcionarios do IBE)</option>
        <option value="Externo">Candidaturas</option>
        <option value="Externo">Requerimentos</option>
        <option value="Externo">Correspondencia</option>
    </select>
</div>

<!-- Proveniencia Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('origem') ? ' has-error' : '' }}">
    {!! Form::label('origem', 'Origem:') !!}
    {!! Form::text('origem', null, ['class' => 'form-control', 'placeholder'=>'Proveniencia do documento']) !!}
</div>

<!-- Assunto Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('assunto') ? ' has-error' : '' }}">
    {!! Form::label('assunto', 'Assunto:') !!}
    {!! Form::text('assunto', null, ['class' => 'form-control']) !!}
</div>

<!-- file Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('file') ? ' has-error' : '' }}">
    {!! Form::label('file', 'Anexar o documento (.PDF):') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('descricao') ? ' has-error' : '' }}">
    {!! Form::label('descricao', 'Observação (opcional):') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-4">
    <label class="checkbox-inline">
        {!! Form::hidden('estado', 0) !!}
        {!! Form::hidden('estado_id', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Submeter documento', ['class' => 'btn btn-link']) !!}
</div>
