<!-- Designacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designacao', 'Designacao:') !!}
    {!! Form::text('designacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Chefe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chefe', 'Chefe:') !!}
    {!! Form::text('chefe', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('destinos.index') }}" class="btn btn-default">Cancel</a>
</div>
