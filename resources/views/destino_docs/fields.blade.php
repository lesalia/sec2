<div class="col-sm-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('/files/transfer.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center"><p>Encaminhar</p></h3>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Doc Id Field -->
{!! Form::hidden('doc_id', $dadosdoc['doc'] ?? '', ['class' => 'form-control']) !!}
{!! Form::hidden('ficheiro', $dadosdoc['file'] ?? '', ['class' => 'form-control']) !!}


<!-- Destino Id Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('destino_id') ? ' has-error' : '' }}">
    <label for="user_id">Encaminhar para:</label>
    <select class="form-control" name="destino_id">
        <option selected="selected" value="{{$destino->id ?? ''}}"> {{$destino->designacao ?? ''}} </option>
        @foreach($destinos as $destino)
            <option value="{{$destino->id}}">{{$destino->designacao}}</option>
        @endforeach
    </select>
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-4 has-feedback{{ $errors->has('observacao') ? ' has-error' : '' }}">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::text('observacao', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-9">
    {!! Form::submit('Encaminhar', ['class' => 'btn btn-default']) !!}
    <a href="{{ route('destinoDocs.index') }}" class="btn btn-default">Cancel</a>
</div>
