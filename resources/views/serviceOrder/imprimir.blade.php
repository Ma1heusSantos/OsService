<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ordem de Serviço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Ordem de Serviço</h1>
        <p>{{ $empresa->razao_social }} - {{ $empresa->cnpj }}</p>
        <p>CNPJ: 00.000.000/0000-00</p>
        <p>RUA EXEMPLO, 123, CENTRO, CIDADE - SP</p>
    </div>
    <div class="section">
        <strong>Cliente:</strong> {{ $serviceOrder->cliente->name }}<br />
        <strong>Veículo:</strong> Modelo do Veículo | Placa: XYZ-1234 | KM:
        30000 | Ano: 2015 | Cor: Preto<br />
        <strong>CPF/CNPJ:</strong> {{ $serviceOrder->cliente->cpf ?? $serviceOrder->cliente->cnpj }}<br />
    </div>
    <div class="section">
        <h3>Serviços</h3>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 45%;">Nome</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (isset($serviceOrder->servicos) && !$serviceOrder->servicos->isEmpty())
                        @foreach ($serviceOrder->servicos as $servico)
                <tr>
                    <td><strong>{{ $servico->descricao }}</strong></td>
                    <td>{{ $servico->pivot->quantidade }}</td>
                    <td>{{ number_format($servico->pivot->preco, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="no-services-message">Nenhum serviço foi feito.</td>
                </tr>
                @endif
                </tr>
            </tbody>
        </table>
    </div>
    <div class="section">
        <h3>Peças:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 46%">Nome:</th>
                    <th>Quantidade:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (isset($serviceOrder->pecas) && !$serviceOrder->pecas->isEmpty())
                <tr>
                    @foreach ($serviceOrder->pecas as $peca)
                        <td>
                            <strong>{{ $peca->nome }}</strong>
                        </td>
                        <td>
                            {{ $peca->pivot->quantidade }}
                        </td>
                    @endforeach
                </tr>
            @else
                <td colspan="3" class="text-center">Nenhuma peça foi utilizada.</td>
                @endif
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <strong>Responsável:</strong> {{ $serviceOrder->mecanico->nome }}<br />
    </div>

    <div class="footer">
        <p>Agradecemos a preferência!</p>
        <p>Volte sempre!</p>
    </div>
</body>

</html>
<script>
    window.onload = function() {
        window.print();
    };
</script>
