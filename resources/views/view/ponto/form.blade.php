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
                @if(isset($ponto))
                <form id="form-familia" method="POST" action="{{ route('ponto.update', ['id' => $ponto->id] ) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form action="{{route('ponto.store')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col">
                                <label for="descricao">Descrição</label>
                                <input class="form-control" type="text" name="descricao" id="descricao" placeholder="descricao" value="{{isset($ponto) ? $ponto->descricao : old('descricao')}}">
                            </div>
                            <div class="col">
                                <label for="contato">Contato</label>
                                <input class="form-control" type="text" name="contato" id="contato" placeholder="contato" value="{{isset($ponto)?$ponto->contato : old('contato')}}" maxlength="11">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="bairro">Bairro</label>
                                <input class="form-control" type="text" name="bairro" id="bairro" placeholder="bairro" value="{{isset($ponto) ? $ponto->bairro : old('bairro')}}">
                            </div>
                            <div class="col">
                                <label for="rua">Rua</label>
                                <input class="form-control" type="text" name="rua" id="rua" placeholder="rua" value="{{isset($ponto) ? $ponto->rua : old('rua')}}">
                            </div>
                            <div class="col">
                                <label for="numero">Nº</label>
                                <input class="form-control" type="text" name="numero" id="numero" placeholder="numero" value="{{isset($ponto) ? $ponto->numero : old('numero')}}">
                            </div>
                        </div>

                        <div class="row mt-2 d-flex justify-content-around">
                            <div class="col">
                                <button class="btn btn-success" type="submit">Salvar</button>
                                <a class="btn btn-secondary" href="{{route('ponto.index')}}">voltar</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@stop