<!-- Doc Id Field -->
<div class="form-group">
    {!! Form::label('doc_id', 'Doc Id:') !!}
    <p>{{ $destinoDoc->doc_id }}</p>
</div>

<!-- Destino Id Field -->
<div class="form-group">
    {!! Form::label('destino_id', 'Destino Id:') !!}
    <p>{{ $destinoDoc->destino_id }}</p>
</div>

<!-- Observacao Field -->
<div class="form-group">
    {!! Form::label('observacao', 'Observacao:') !!}
    <p>{{ $destinoDoc->observacao }}</p>
</div>

<!-- Ficheiro Field -->
<div class="form-group">
    {!! Form::label('ficheiro', 'Ficheiro:') !!}
    <p>{{ $destinoDoc->ficheiro }}</p>
</div>

