@extends('adminlte::page')

@section('title', 'Relatório')

@section('content')
<div class="row pt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="col justify-content-center">
                    <h3 class="text-center">Relatório</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <strong>CNPJ:</strong>
                        <p>{{$perfil->cnpj}}</p>
                    </div>
                    <div class="col">
                        <strong>Razão Social:</strong>
                        <p>{{$perfil->razao_social}}</p>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-sm">
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
                                <?php $tot += floatval($dizimo->valor); ?>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"> Total de Dízimos de {{$data_ini}} até {{$data_fim}} </td>
                                <td> {{toCurrency($tot)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection