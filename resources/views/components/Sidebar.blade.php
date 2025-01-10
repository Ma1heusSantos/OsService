<nav id="sidebar" class="d-flex flex-column" style="height: 100vh;">
    <div class="flex-grow-1 justify-content-between">
    <div class="sidebar-header">
        <h3>
            <a href="{{ url('home') }}">{{ env('APP_NAME') }}</a>
        </h3>
    </div>
    <ul class="list-unstyled components flex-grow-1">
        <li>
            <a href="{{ route('show.client') }}">
                <i class="fa-solid fa-person"></i> Clientes
            </a>
        </li>
        <li>
            <a href="{{ route('show.peca') }}">
                <i class="fa-solid fa-cubes"></i> Peças
            </a>
        </li>
        <li>
            <a href="{{ route('serviceOrder.show') }}">
                <i class="fa-solid fa-file-pen"></i> Ordens de Serviço
            </a>
        </li>
        <li>
            <a href="{{ route('show.categoria') }}">
                <i class="fa-solid fa-list-ul"></i> Categorias
            </a>
        </li>
        <li>
            <a href="{{ route('show.servicos') }}">
                <i class="fa-solid fa-wrench"></i> Serviços
            </a>
        </li>
        <li>
            <a href="{{ route('show.users') }}">
                <i class="fa-solid fa-user"></i> Usuários
            </a>
        </li>
        <li>
            <a href="{{ route('show.mecanicos') }}">
                <i class="fa-solid fa-user-gear"></i> Mecânicos
            </a>
        </li>
    </ul>
    </div>
    <div class="btnLogout">
    <ul class="list-unstyled components">  <!-- botão logout -->
        <li>
            <a href="{{ route('logout') }}">
                <i class="fa-solid fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
    </div>
</nav>