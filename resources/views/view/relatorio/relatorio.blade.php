<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>
        .font-weight-bold {
            font-weight: bold;
        }

        .container {
            margin: 0px;
        }

        .row {
            display: flex;
            flex-direction: row;
        }

        .pt-3 {
            padding: 3px;
        }

        .card {
            display: flex;
        }

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            /* Remove o espaço entre bordas */
        }

        th {
            background-color: gainsboro;
            padding: 8px;
            /* Aumentei o padding para melhor legibilidade */
            border: 1px solid #ddd;
            /* Adiciona bordas entre colunas */
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
            /* Adiciona bordas entre colunas */
        }

        /* Estilo striped: linhas alternadas */
        tr:nth-child(odd) {
            background-color: #f9f9f9;
            /* Cor de fundo para linhas ímpares */
        }

        tr:nth-child(even) {
            background-color: #ffffff;
            /* Cor de fundo para linhas pares */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center">Relatório</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <span><strong>CNPJ: </strong> {{formatCnpj($perfil->cnpj)}}</span>
                <span><strong>Razão Social: </strong> {{$perfil->razao_social}}</span>
                <span><strong>Cidade: </strong> {{$perfil->cidade}}</span>
            </div>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Membro</th>
                            <th>Ponto</th>
                            <th>R$</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $tot = 0;
                        ?>
                        @foreach ($dizimos as $dizimo)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$dizimo->Membro->nome}}</td>
                            <td>{{$dizimo->Membro->Ponto->descricao}}</td>
                            <td>{{toCurrency($dizimo->valor)}}</td>
                            <?php
                            $tot += floatval(str_replace(',', '.', $dizimo->valor));
                            ?>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="font-weight-bold" style="text-align: end;"> Total de Dízimos de {{$data_ini}} até {{$data_fim}} </td>
                            <td class="font-weight-bold"> {{toCurrency($tot)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>