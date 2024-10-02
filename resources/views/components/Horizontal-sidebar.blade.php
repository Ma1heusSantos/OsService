<nav class="navbar navbar-expand-lg navbar-light bg-light vertical" style="background: #fff !important">
    <div class="container-fluid" style="display: flex; justify-content: space-between !important">
        <button type="button" id="sidebarCollapse" class="btn btn-geniusis">
            <i class="fas fa-bars"></i>
        </button>
        <button class="btn btn-geniusis d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown"
                            data-target="#auth-menu" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" id="auth-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Alterar Senha</a>
                            <hr />
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="#" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
