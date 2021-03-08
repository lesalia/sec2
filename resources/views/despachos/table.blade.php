<div class="table-responsive">
    <table id="cacau" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Nr do Documento</th>
            <th>Assunto</th>
            <th>Data do Despacho</th>
            <th>Resposta</th>
            <th colspan="1">opção</th>
        </tr>
        </thead>
    <tbody>
        @foreach($despachos as $despacho)
        <tr>
            <td>{{ $despacho->doc['nrDoc'] }}</td>
            <td>{{ Str::limit($despacho->doc['assunto'], 30) }}</td>
            <td>{{ ($despacho->created_at)->format('d - M - Y') }}</td>
            <td> </td>
            <td>
                {!! Form::open(['route' => ['despachos.destroy', $despacho->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('despachos.show', [$despacho->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i> Detalhes </a>
{{--                    <a href="{{ route('despachos.edit', [$despacho->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
