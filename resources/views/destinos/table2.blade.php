<div class="table-responsive">
    <table class="table" id="destinos-table">
        <thead>
            <tr>
                <th>Data de registo</th>
                <th>Encaminhado Para</th>
                <th>Confirmado por:</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destino2->destinos as $destino)
            <tr>
                <td>{{ $destino->pivot->created_at }}</td>
                <td>{{ $destino->designacao }}</td>
                <td>{{ $destino->chefe }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
