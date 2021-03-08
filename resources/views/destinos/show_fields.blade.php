<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile img-responsive" src="{{asset('/files/transfer.jpg')}}" alt="doc file">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <span><a class="pull-center"> {{$destino->designacao}}</a> </span>
                </li>
                <li class="list-group-item">
                    <span>Chefe: </span> <a class="pull-center"> {{$destino->chefe}}</a>
                </li>
                <li class="list-group-item">
                    <span>e-mail: </span> <a class="pull-center"> {{$destino->email}}</a>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
@include('docs.table2')

