<div class="table-responsive">
    <table class="table" id="destinoDocs-table">
        <thead>
            <tr>
                <th>Nr. Documento</th>
        <th>Encaminhado para</th>
        <th>Observacao</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destinoDocs as $destinoDoc)
            <tr>
            <td>{{ $destinoDoc->doc_id }}</td>
            <td>{{ $destinoDoc->destino_id }}</td>
            <td>{{ $destinoDoc->observacao }}</td>
                <td>
                    {!! Form::open(['route' => ['destinoDocs.destroy', $destinoDoc->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('destinoDocs.show', [$destinoDoc->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('destinoDocs.edit', [$destinoDoc->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
