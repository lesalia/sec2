<div class="col-md-4">
<fieldset>
    <legend>Detalhes do Despacho</legend>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group-sm row ">
                <div class="col-sm-12"> Data de Registo:
                    <input class="form-control" type="text" value="{{ $despacho->created_at->format('d - M - Y')}}">
                </div>
            </div>
            <br>
            <div class="form-group-sm row ">
                <div class="col-sm-12"> Resposta:
                    <input class="form-control" type="text" value="{{ $despacho->resposta}}">
                </div>
            </div><br>
            <div class="form-group-sm row ">
                <div class="col-sm-12"> Detalhes adicionais:
                    <input class="form-control" type="text" value="{{ $despacho->obs}}">
                </div>
            </div> <br>
            <div class="form-group-sm row ">
                <div class="col-sm-12"> confirmado por:
                    <input class="form-control" type="text" value="{{ $despacho->user}}">
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</fieldset>
    <a href= {{asset($despacho->file)}} target="_blank"> Baixar este documento <i class="fa fa-cloud-download" aria-hidden="true"></i> </a>
</div>

<div class="col-md-8">
    <iframe
        src="{{url($despacho->file)}}" style="height:400px; width:640px" frameborder="no">
    </iframe>
</div>
