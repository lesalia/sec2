<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>username</th>
            <th>Estado</th>
            <th>Nivel de acesso</th>
            <th colspan="1">opção</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->username !!}</td>
                <td>
                    @switch($user->estado)
                        @case(0)
                        <i class="fa fa-user text-red"> <span> Bloqueado</span></i>
                        @break
                        @case(1)
                        <i class="fa fa-user text-green"> <span> Activo</span></i>
                        @break
                    @endswitch
                </td>
                <td>
                    @switch($user->nivel)
                        @case(0)
                        <i class="fa fa-user"> <span> Recepcionista</span></i>
                        @break
                        @case(1)
                        <i class="fa fa-user"> <span> Utente </span></i>
                        @break
                        @case(2)
                        <i class="fa fa-user"> <span> Administrador</span></i>
                        @break
                    @endswitch
                </td>
                <td>
                    @can('criar-user')
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
{{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Voce tem certeza?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>
