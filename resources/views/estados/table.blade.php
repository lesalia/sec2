<div class="table-responsive">
    <table class="table" id="estados-table">
        <thead>
            <tr>
                <th>Designacao</th>
        <th>Detalhe</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->designacao }}</td>
            <td>{{ $estado->detalhe }}</td>
                <td>
                    {!! Form::open(['route' => ['estados.destroy', $estado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estados.show', [$estado->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('estados.edit', [$estado->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
