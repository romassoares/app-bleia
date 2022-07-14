@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
<h1 class="m-0 text-dark">Ponto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p><strong>Cidade: </strong>{{$ponto->cidade}}</p>
                <p><strong>Bairro: </strong>{{$ponto->bairro}}</p>
                <p><strong>Rua: </strong>{{$ponto->rua}}</p>
                <p><strong>Numero: </strong>{{$ponto->numero}}</p>
                <p><strong>Contato: </strong>{{$ponto->contato}}</p>
                <a href="{{route('ponto.index')}}">voltar</a>
            </div>
        </div>
    </div>
</div>
@stop