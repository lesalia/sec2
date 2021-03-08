<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
{{--    <section class="sidebar" style="background: #38a626">--}}
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/files/defuser.png')}}" class="img-circle" alt=""/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p> IBE - Maputo</p>
                @else
                    @switch(Auth::user()->nivel)
                        @case(0)
                        <i class=""> <span> Recepcionista</span></i>
                        @break
                        @case(1)
                        <i class=""> <span> Utente </span></i>
                        @break
                        @case(2)
                        <i class=""> <span> Administrador</span></i>
                    @break
                @endswitch
                @endif
                <!-- Status -->
                <br><p><i class="fa fa-circle text-success"></i> Activo</p>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">

            </div>
        </form>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
