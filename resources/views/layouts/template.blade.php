<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('/sidebar/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('assets/logooficial.png') }}">
    <title> @yield('title')</title>
    <style>
        .navbar {
            background-color: #6b45bc !important;
        }

        .nav-link {
            color: #fff !important;
        }

        .nav-link:hover {
            color: #111 !important;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <x-Sidebar></x-Sidebar>
        <div id="content">
            <x-Horizontal-sidebar></x-Horizontal-sidebar>
            @yield('conteudo')
        </div>
    </div>
</body>

<script defer>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
        // Máscara para dinheiro
        var $money = $(".money");
        $money.mask('000.000.000,00', {
            reverse: true
        });

        // Máscara para CPF
        var $cpf = $(".cpf");
        $cpf.mask('000.000.000-00', {
            reverse: true
        });

        // Máscara para CNPJ
        var $cnpj = $(".cnpj");
        $cnpj.mask('00.000.000/0000-00', {
            reverse: true
        });

        // Máscara para telefone fixo
        var $tel = $(".tel");
        $tel.mask('(00) 0000-0000');

        // Máscara para celular
        var $celular = $(".celular");
        $celular.mask('(00) 00000-0000');
    });
</script>

</html>
