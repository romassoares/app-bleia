@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
<h1 class="m-0 text-dark">Ponto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div><strong>Bairro: </strong>{{$ponto->bairro}}</div>
                <div><strong>Rua: </strong>{{$ponto->rua}}</div>
                <div><strong>Numero: </strong>{{$ponto->numero}}</div>
                <div><strong>Contato: </strong>{{$ponto->contato}}</div>
                <a class="btn btn-default" href="{{route('ponto.index')}}">voltar</a>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3>Dízimos</h3>
                <table class="table table-sm">
                    <thead>
                        <th>#</th>
                        <th>Mês</th>
                        <th>R$</th>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        $tot = 0;
                        @endphp
                        @foreach ($dizimos as $dizimo)
                        <tr>
                            <td>@php echo $i++ @endphp</td>
                            <td>{{$dizimo->mes}}</td>
                            <td>{{toCurrency($dizimo->valor)}}</td>
                            @php
                            $tot += floatval(str_replace(',', '.', $dizimo->valor));
                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">Total</td>
                            <td>{{toCurrency($tot)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop