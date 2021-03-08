<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('files/defaultuser.png')}}" alt="User profile picture">
            <h3 class="profile-username text-center"><p>Utilizadores</p></h3>
        </div>
    </div>
</div>

<div class="col-md-9">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nome completo') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- username Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('username', 'username') !!}
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Nivel Field -->
    <div class="form-group col-sm-6">
        <label for="seeAnotherField"> Nivel de Acesso</label>
        <select name="nivel" class="form-control">
            <option selected="selected" value="{{$user->nivel ?? '0'}}"> Alterar previlegio</option>
            <option value="0"> Recepcionista</option>
            <option value="2"> Administrador</option>
        </select>
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Confirmation Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password Confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
</div>
