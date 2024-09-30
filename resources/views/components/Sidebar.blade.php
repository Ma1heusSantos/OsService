<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.9;
        }

        .custom-dropdown-item:hover {
            background-color: #6f42c1;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="d-flex flex-column p-3 text-white vh-100" style="width: 280px; background-color:#6f42c1;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <img src="{{ asset('assets/logooficial.png') }}" style="width: 20%" />
            <span class="fs-4 text-white">Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    Usuários
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <strong>email user</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark custom-dropdown-item text-small shadow">
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</body>
