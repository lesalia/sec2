
@can('recepcionista')
    <li class="treeview">
        <a style="color:white" href="#">
            <i class="fa fa-paste"></i> <span>Documentos <b style="color: crimson">[+0{{ $docspend }}]</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('docs*') ? 'active' : '' }}">
                <a href="{{ route('docs.index') }}"><i class="fa fa-sign-in"></i> <span>Recebidos</span></a>
            </li>
            <li class="{{ Request::is('despachos*') ? 'active' : '' }}">
                <a href="{{ route('despachos.index') }}"><i class="fa fa-check-square"></i><span>Despachados</span></a>
            </li>
        </ul>
    </li>
@endcan

    <li class="{{ Request::is('docs*') ? 'active' : '' }}">
        <a style="color:white" href="{{ route('docs.create') }}"><i class="fa fa-upload"></i><span>Submeter Documentos</span></a>
    </li>
    <li class="treeview">
        <a style="color:white" href="#">
            <i class="fa fa-paste"></i> <span>Documentos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('docs*') ? 'active' : '' }}">
                <a href="{{ route('docs.index') }}"><i class="fa fa-sign-in"></i><span>Submetido</span></a>
            </li>
            <li class="{{ Request::is('despachos*') ? 'active' : '' }}">
                <a href="{{ route('despachos.index') }}"><i class="fa fa-check-square"></i><span>Despachados</span></a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('minutas*') ? 'active' : '' }}">
        <a style="color:white" href="{{ url('minutas') }}"><i class="fa fa-paste"></i><span>Minutas</span></a>
    </li>
    <li class="{{ Request::is('manual*') ? 'active' : '' }}">
        <a style="color:white" href="{{ url('manual') }}"><i class="fa fa-question-circle"></i><span>Perguntas Frequentes</span></a>
    </li>

@can('criar-user')
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a style="color:white" href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Utilizadores</span></a>
    </li>
    <li class="{{ Request::is('relatorio*') ? 'active' : '' }}">
        <a style="color:white" href="{{ url('relatorio') }}"><i class="fa fa-print"></i><span>Relatório</span></a>
    </li>
    <li class="{{ Request::is('destinos*') ? 'active' : '' }}">
        <a style="color:white"  href="{{ route('destinos.index') }}"><i class="fa fa-hospital-o"></i><span>Departamentos</span></a>
    </li>
@endcan

{{--<li class="{{ Request::is('destinoDocs*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('destinoDocs.index') }}"><i class="fa fa-edit"></i><span>tramitados</span></a>--}}
{{--</li>--}}

