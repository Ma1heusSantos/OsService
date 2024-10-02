<nav id="sidebar">
    <div class="sidebar-header">
        <h3>
            <a href="{{ url('home') }}"> {{ env('APP_NAME') }}</a>
        </h3>
    </div>
    <ul class="list-unstyled components">

        <li>
            <a href="#" target="_blank">
                <i class="fas fa-desktop"></i>
                Recarregar
            </a>
        </li>

        <li>
            <a href="#pageSubmenu" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cash-register"></i>
                Usuários
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Exibir usuários</a>
                </li>
            </ul>
        </li>
        <hr>
    </ul>
</nav>
