<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('home.index') }}"><i class="fa fa-home"></i> Home <span class="fa"></span></a></li>
            <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('client.person') }}">Pessoa Física</a></li>
                    <li><a href="{{ route('client.company') }}">Pessoa Jurídica</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>