@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('/css/home.css') }}">
@endsection

@section('title')
    Home
@endsection

@section('conteudo')
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #866ec7; box-shadow: none !important;">
        <div class="container-fluid display-flex align-items-start">
            <a class="navbar-brand" href="#"></a>
            <img src="{{ asset('/assets/logooficial.png') }}" alt="Logo" width="100" height="96"
                class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse display-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- imagem clientes -->
                    <li class="nav-item mb-1 mx-3">
                        <a class="nav-link icon-format" href="{{ route('show.client') }}" data-bs-toggle="modal"
                            title="Clientes"role="button">
                            <img src="{{ asset('/assets/img_cliente.png') }}" alt="Bootstrap" width="48" height="48">
                            Clientes
                        </a>

                    </li>
                    <!-- imagem produtos -->
                    <li class="nav-item mb-1 mx-3">
                        <a class="nav-link icon-format" href="{{ route('show.peca') }}" data-bs-toggle="modal"
                            title="Componetes"role="button">
                            <img src="{{ asset('/assets/img_produtos.png') }}" alt="Bootstrap" width="48"
                                height="48">
                            Componentes
                        </a>

                    </li>
                    <!-- imagem os -->
                    <li class="nav-item mb-1 mx-3">
                        <a class="nav-link icon-format" href="{{ route('serviceOrder.show') }}" data-bs-toggle="modla"
                            title="Ordem de serviço">
                            <img src="{{ asset('/assets/img_os.png') }}" alt="Bootstrap" width="48" height="48">
                            OS
                        </a>
                    </li>
                    <!-- imagem OBJETOS -->
                    <li class="nav-item mx-3">
                        <a class="nav-link icon-format" href="#">
                            <img src="{{ asset('/assets/img_veiculo.png') }}" alt="Bootstrap" width="48" height="48">
                        </a>
                    </li>
                    <!-- imagem servicos -->
                    <li class="nav-item mx-3">
                        <a class="nav-link icon-format" href="{{ route('show.servicos') }}" data-bs-toggle="modal"
                            title="Serviços" role="button">
                            <img src="{{ asset('/assets/img_cadservico.png') }}" alt="Bootstrap" width="48"
                                height="48">
                            Serviços
                        </a>
                    </li>
                    <!-- imagem usuarios -->
                    <li class="nav-item mx-3">
                        <a class="nav-link icon-format" href="{{ route('show.servicos') }}" data-toggle="modal"
                            title="Usuários">
                            <img src="{{ asset('/assets/img_user.png') }}" alt="Bootstrap" width="48" height="48">
                            Usuários
                        </a>
                    </li>
                    <!-- imagem mecanicos -->
                    <li class="nav-item mx-3">
                        <a class="nav-link icon-format" href="{{ route('show.servicos') }}" data-toggle="modal"
                            title="Usuários">
                            <img src="{{ asset('/assets/usuario-mecanico.png') }}" alt="Bootstrap" width="48"
                                height="48">
                            Mecânicos
                        </a>
                    </li>
                    {{-- <li class="nav-item mx-3">
                    <a class="nav-link icon-format" href="#cadempresa" data-bs-toggle="modal" title="Empresa" role="button">
                        <img src="{{ Vite::asset('public/img_empresa.png') }}" alt="Bootstrap" width="48" height="48">
                        Empresas
                    </a>
                </li> --}}
                    <li class="nav-item mx-3">
                        <a class="nav-link icon-format" href="{{ route('logout') }}" data-bs-toggle="modal"
                            title="Serviços" role="button">
                            <img src="{{ asset('/assets/shutdown-icon.svg') }}" alt="Bootstrap" width="48"
                                height="48">
                            Sair
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('script')
    {{-- <script>
        function logout(target) {
            target.submit()
        }

        function setBoolValue(target) {
            target.value = 1
        }

        function populateState(target) {
            const uf = target.options[target.selectedIndex].getAttribute('estado');

            const state = document.querySelector('#inputState');
            for (let i = 0; i < state.options.length; i++) {
                if (state.options[i].getAttribute('value') === uf) {
                    state.selectedIndex = i;
                    break;
                }
            }
        }

        function searchClients(target) {
            const search = document.getElementById('#inputSearch').value;
            search = search.toLowerCase()
            const clients = document.getElementById('#listClients');

            for (let i = 0; i < clients.rows.length; i++) {
                nomeFantasia = clients.rows[i].cells[1].innerText;
                cnpj = clients.rows[i].cells[1].innerText;
                if (nomeFantasia.startsWith(search) || cnpj.startsWith(search)) {

                }
            }
        }
    </script> --}}
@endsection
