<div class="table-responsive">
    <table class="table" id="destinos-table">
        <thead>
            <tr>
                <th>Designacao</th>
        <th>Chefe</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destinos as $destino)
            <tr>
                <td>{{ $destino->designacao }}</td>
            <td>{{ $destino->chefe }}</td>
            <td>{{ $destino->email }}</td>
                <td>
                    {!! Form::open(['route' => ['destinos.destroy', $destino->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('destinos.show', [$destino->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('destinos.edit', [$destino->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
{{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
