<div class="table-responsive">
<table id="cacau" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Nrdoc</th>
            <th>Referencia</th>
            <th>Data entrada</th>
            <th>Assunto</th>
            <th>Estado</th>
            <th colspan="1">opção</th>
        </tr>
        </thead>
        <tbody>
        @foreach($docs as $doc)
            <tr>
                <td> <i class="fa fa-file-word-o"> </i> {{ $doc->nrDoc }}</td>
                <td> {{ $doc->referencia }}</td>
                <td>{{ ($doc->created_at)->format('j \d\e F \d\e Y') }}</td>
                <td>{{ Str::limit($doc->assunto, 40) }}</td>
                <td> <span> {{ $doc->estado['designacao'] }}</span></td>
                <td>
                    {!! Form::open(['route' => ['docs.destroy', $doc->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('docs.show', [$doc->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('docs.edit', [$doc->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
